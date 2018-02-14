<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Distributors
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class Distributors extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'distributors';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'cnpj',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'cnpj' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'user_id' => 'Usuário',
        'cnpj' => 'CNPJ',
    ];
	
	
    
    /**
     * Busca o modelo de resellers     * @return resellers     */
    public function Resellers() {
        return $this->hasMany('App\Models\Resellers', 'distributor_id', 'id');
    }


    /**
     * Busca o modelo de users 
	 *
     * @return users 
     */
    public function User() {
        return $this->hasOne('App\Models\Users', 'id', 'user_id')->withDefault();
    }

    /**
     * Verifica se o usuário tem permissão pra acessar o registro
     *
     * @return null
     */
    public function authorize(){
    
        if(!empty($this->id)) {

            $builder = self::select(); 
            $builder->where('id', $this->id);
            //$builder->where('user_id', \Auth::user()->id);

            // Grava em laravel.log
            //
            //\Log::info($builder->getBindings());
            //\Log::info($builder->toSql());

            if($builder->count() <= 0){
                die(view('default/403')->render());
            }
        } 
    }
    
    
    /**
     * Realiza a consulta da tabela
     *
     * @param array $filter
     * @return \Illuminate\Support\Collection
     */
    public function search(array $filter = [], $expression = 'distributors.*, users.name, users.email') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);
		$builder->join('users', 'users.id', '=', 'distributors.user_id');

        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('id', $filter['id']);
        }
           
        if(array_key_exists('user_id', $filter) && !empty($filter['user_id'])) {
            $builder->where('user_id', $filter['user_id']);
        }
           
        if(array_key_exists('cnpj', $filter) && !empty($filter['cnpj'])) {
            $builder->where('cnpj', $filter['cnpj']);
        }
        
        
        if(array_key_exists('groupBy', $filter) && !empty($filter['groupBy'])) {
            $builder->orderBy($filter['groupBy'], 'ASC');
        }
        else {
            $builder->orderBy('id', 'DESC');
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
	
	public function storage($data = array()) {
		
		$model = Users::find($this->user_id);

		if(empty($model)) {
			
			$model = Users::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt(str_shuffle(date('Y-m-d'))),
				'acl_id' => Acls::query()
					->where('UID', 'DISTRIBUTOR')
						->first()->id,
			]);
			
			$this->user_id = $model->id;
		}
		else {
			
			$model->fill(['name' => $data['name'], 'email' => $data['email']]);
			$model->save();
		}

		return parent::save();
	}
}
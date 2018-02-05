<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Licenses
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class Licenses extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'licenses';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'product_id',
        'type_id',
        'user_id',
        'length',
        'expiration',
        'hash',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'type_id' => 'integer',
        'user_id' => 'integer',
        'length' => 'integer',
        'expiration' => 'string',
        'hash' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'product_id' => 'Produto',
        'type_id' => 'Tipo',
        'user_id' => 'Usuário',
        'length' => 'Limite  ( Usuários ou Mailboxes )',
        'expiration' => 'Data de expiração',
        'hash' => 'Storage',
    ];
	
	/**
	 * Mutator para Data de expiração	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setExpirationAttribute($value){
		
		if(preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {
			
			$value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
		}
		
		$this->attributes['expiration'] = $value;
	}
		
    /**
     * Busca o modelo de products     
	 * 
	 * @return products     
	 */
    public function Product() {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    /**
     * Busca o modelo de license_types     
	 * 
	 * @return license_types     
	 */
    public function Type() {
        return $this->hasOne('App\Models\LicenseTypes', 'id', 'type_id');
    }

    /**
     * Busca o modelo de users    
	 * 
	 * @return users     
	 */
    public function User() {
        return $this->hasOne('App\Models\Users', 'id', 'user_id');
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
    public function search(array $filter = [], $expression = '*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);

           
        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('id', $filter['id']);
        }
           
        if(array_key_exists('product_id', $filter) && !empty($filter['product_id'])) {
            $builder->where('product_id', $filter['product_id']);
        }
           
        if(array_key_exists('type_id', $filter) && !empty($filter['type_id'])) {
            $builder->where('type_id', $filter['type_id']);
        }
           
        if(array_key_exists('user_id', $filter) && !empty($filter['user_id'])) {
            $builder->where('user_id', $filter['user_id']);
        }
           

        if(array_key_exists('expiration', $filter) && !empty($filter['expiration'])) {
            $builder->where('expiration', $filter['expiration']);
        }
           
        if(array_key_exists('hash', $filter) && !empty($filter['hash'])) {
            $builder->where('hash', $filter['hash']);
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
}
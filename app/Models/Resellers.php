<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Resellers
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class Resellers extends \Eloquent {
    
    use SoftDeletes;
	
	const UID = 'RESELLER';
	
    protected $primaryKey = 'id';
    
    public $table = 'resellers';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'distributor_id',
        'cnpj',
		'razao_social',
		'inscricao_estadual',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'distributor_id' => 'integer',
        'cnpj' => 'string',
		'razao_social' => 'string',
		'inscricao_estadual' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'user_id' => 'Usuário',
        'distributor_id' => 'Distribuidor',
        'cnpj' => 'CNPJ',
		'razao_social' => 'Razão social',
		'inscricao_estadual' => 'Inscrição Estadual',
    ];
	
	//--------------------------------------------------------------------------
	// Overrides
	//--------------------------------------------------------------------------
	public static function boot() {
		
		// Persiste um usuário de acesso antes de salvar este regitro
		parent::registerModelEvent('saving', \App\Listeners\StakeholderSaving::class);
		parent::registerModelEvent('saved', \App\Listeners\StakeholderSaved::class);
		parent::boot();
	}
	//--------------------------------------------------------------------------
	// Mutators
	//--------------------------------------------------------------------------
	public function setRazaoSocialAttribute($value) {
		$this->attributes['razao_social'] = strtoupper($value);
	}

	//--------------------------------------------------------------------------
	// Relations
	//--------------------------------------------------------------------------
	/**
     * Busca o modelo de clients     * @return clients     */
    public function Clients() {
        return $this->hasMany('App\Models\Clients', 'reseller_id', 'id');
    }


    /**
     * Busca o modelo de distributors 
	 *
     * @return distributors 
     */
    public function Distributor() {
        return $this->hasOne('App\Models\Distributors', 'id', 'distributor_id')->withDefault();
    }
    /**
     * Busca o modelo de users 
	 *
     * @return users 
     */
    public function User() {
        return $this->hasOne('App\Models\Users', 'id', 'user_id')->withDefault();
    }
	//--------------------------------------------------------------------------
	// Métodos próprios
	//--------------------------------------------------------------------------
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
    public function search(array $filter = [], $expression = 'resellers.*, users.name, users.email') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);
		$builder->join('users', 'users.id', '=', 'resellers.user_id');
           
        if(array_has($filter, 'distributor_id')) {
            $builder->where('distributor_id', $filter['distributor_id']);
        }
           
        if(array_has($filter, 'cnpj')) {
            $builder->where('cnpj', $filter['cnpj']);
        }
		
		if(array_has($filter, 'user_id')) {
            $builder->where('user_id', $filter['user_id']);
        }

		if(array_has($filter, 'name')) {
            $builder->where('name', 'LIKE', '%'.array_get($filter, 'name').'%');
        }
		
		if(array_has($filter, 'distributor')) {
			$builder->whereExists(function($builder) use($filter){
                $builder->select(\DB::raw(1))
                    ->from('distributors')
                    ->whereRaw('distributors.id = '.$this->getTable().'.distributor_id AND user_id IN(SELECT id FROM `users` WHERE `name` LIKE "%'.$filter['distributor'].'%")');
            });
        }
		
		// Somente as revendas que percente ao distribuidor que esta logado
		if(app_can('DISTRIBUTOR')) {
            
            $builder->whereExists(function($builder) use($filter){
                $builder->select(\DB::raw(1))
                    ->from('distributors')
                    ->whereRaw('distributors.id = resellers.distributor_id AND distributors.user_id = '.\Auth::user()->id);
            });
        }
        
        if(array_has($filter, 'groupBy')) {
            $builder->orderBy($filter['orderBy'], 'ASC');
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
	
	public function toHash($default){
		
		if(app_can('ADMIN')) {
			
			return app_fetch('Resellers', 'name', 'id', [
				'distributor_id' => request('distributor_id', $default)
			]);
		}
		elseif(app_can('DISTRIBUTOR')){
			
			$default = \App\Models\Distributors::select()
				->where('user_id', \Auth::user()->id)
					->firstOrFail()
						->id;
	
			return app_fetch('Resellers', 'name', 'id', [
				'distributor_id' => request('distributor_id', $default)
			]);
		}
		elseif(app_can('RESELLER')){
			
			return app_fetch('Resellers', 'name', 'id', [
				'user_id' => \Auth::user()->id
			]);
		}
		
		return [];
	}
}
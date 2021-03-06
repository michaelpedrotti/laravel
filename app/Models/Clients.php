<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Clients
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class Clients extends \Eloquent {
    
    use SoftDeletes;
	
	const UID = 'CUSTUMER';
	
    protected $primaryKey = 'id';
    
    public $table = 'clients';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'reseller_id',
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
        'reseller_id' => 'integer',
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
        'reseller_id' => 'Revendedor',
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
     * Busca o modelo de resellers 
	 *
     * @return resellers 
     */
    public function Reseller() {
		return $this->hasOne('App\Models\Resellers', 'id', 'reseller_id')->withDefault();
    }
    /**
     * Busca o modelo de users 
	 *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne 
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
    public function search(array $filter = [], $expression = 'clients.*, users.name, users.email') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);
		$builder->join('users', 'users.id', '=', 'clients.user_id');
           
        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('id', $filter['id']);
        }
           
        if(array_key_exists('user_id', $filter) && !empty($filter['user_id'])) {
            $builder->where('user_id', $filter['user_id']);
        }
           
        if(array_key_exists('reseller_id', $filter) && !empty($filter['reseller_id'])) {
            $builder->where('reseller_id', $filter['reseller_id']);
        }
		           
        if(array_key_exists('cnpj', $filter) && !empty($filter['cnpj'])) {
            $builder->where('cnpj', $filter['cnpj']);
        }
        
		if(array_has($filter, 'name')) {
            $builder->where('name', 'LIKE', '%'.array_get($filter, 'name').'%');
        }
		
        if(array_has($filter, 'reseller')) {
			$builder->whereExists(function($builder) use($filter){
                $builder->select(\DB::raw(1))
                    ->from('resellers')
                    ->whereRaw('resellers.id = '.$this->getTable().'.`reseller_id` AND user_id IN(SELECT id FROM `users` WHERE `name` LIKE "%'.$filter['reseller'].'%")');
            });
        }
		
		if(app_can('DISTRIBUTOR')) {
			// Somente os clientes que percente a alguma revenda de um distribuidor

            $builder->whereExists(function($builder) use($filter){
                $builder->select(\DB::raw(1))
                    ->from('resellers')
					->join('distributors', 'distributors.id', '=', 'resellers.distributor_id')
                    ->whereRaw('resellers.id = clients.`reseller_id`')
					->whereRaw('distributors.user_id = '.\Auth::user()->id);
            });
			
			//\Log::alert($builder->toSql());
			//\Log::alert($builder->getBindings());
        }
		elseif(app_can('RESELLER')) {
			// Somente os clientes que percente a um revendedor que esta logado
			
            $builder->whereExists(function($builder) use($filter){
                $builder->select(\DB::raw(1))
                    ->from('resellers')
                    ->whereRaw('resellers.id = clients.`reseller_id` AND resellers.user_id = '.\Auth::user()->id);
            });
        }
		
		
        if(array_key_exists('orderBy', $filter) && !empty($filter['orderBy'])) {
            $builder->orderBy($filter['orderBy'], 'ASC');
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
	
	public function getColumns(){
		
		$arr = [
			'id' => $this->labels['id'],
			'user_id' => __('Cliente'),
			'reseller_id' => __('Revendedor')
		];

		if(app_can('ADMIN')){
			$arr['distributor_id'] = __('Distribuidor');
		}
		
		$arr['cnpj'] = $this->labels['cnpj'];
		
		return $arr;
	}
	
	public function toHash($default){
		
		if(app_can('ADMIN')) {
			
			return app_fetch('Clients', 'name', 'id', [
				'reseller_id' => request('reseller_id', $default)
			]);
		}
		elseif(app_can('DISTRIBUTOR')){
			
			$default = \App\Models\Resellers::select('resellers.*')
				->join('distributors', 'distributors.id', 'resellers.distributor_id')
				->where('distributors.user_id', \Auth::user()->id)
					->firstOrFail()
						->id;

			return app_fetch('Clients', 'name', 'id', [
				'reseller_id' => request('reseller_id', $default)
			]);
		}
//		elseif(app_can('RESELLER')){
//			
//			return app_fetch('Resellers', 'name', 'id', [
//				'user_id' => \Auth::user()->id
//			]);
//		}
		
		return [];
	}
}
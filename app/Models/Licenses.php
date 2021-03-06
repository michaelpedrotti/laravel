<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Licenses
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 15/02/2018
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
        'customer_id',
		'status',
        'count',
        'expiration_app',
		'expiration_upd',
        'hash',
		'zend_id',
		'verification_code',
		'stream',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'type_id' => 'integer',
        'customer_id' => 'integer',
		'status' => 'string',
        'count' => 'integer',
        'expiration_app' => 'data',
		'expiration_upd' => 'data',
        'hash' => 'string',
		'zend_id' => 'string',
		'verification_code' => 'string',
		'stream' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'product_id' => 'Produto',
        'type_id' => 'Tipo de licença',
        'customer_id' => 'Cliente',
        'count' => 'Limite ( Usuários ou Mailboxes )',
        'expiration_app' => 'Expiração da interface',
		'expiration_upd' => 'Expiração do update',
        'hash' => 'Chave',
		'status' => 'Situação',
		'zend_id' => 'Código de licenciamento',
		'verification_code' => 'Código de verificação',
		'stream' => 'Licença'
    ];
	
	public function statusMapperName(){
		
		$array = $this->statusMapper();
		
		return array_key_exists($this->status, $array) ? $array[$this->status] : $this->status;
	}
	
	public function statusMapper(){
		
		return [
			'S' => 'Aguardando aprovação', // Solicitada
			'A' => 'Gerando',// Aguardando
			'R' => 'Rejeitada',// Rejeitada
			'G' => '-'// Gerada
		];
	}
	
	public function statusMapperWithRoles(){
		
		$mapper = $this->statusMapper();
		
		$array = [];
		
		// admin cria uma nova licença
		if(empty($this->id)) {
			
			$array['S'] = $mapper['S'];
			$array['A'] = $mapper['A'];
		}
		// Já existe
		else {
			
			$array['A'] = $mapper['A'];
			$array['R'] = $mapper['R'];
		}
		
		return $array;
	}
    //--------------------------------------------------------------------------
	// Mutators
	//--------------------------------------------------------------------------
	/**
	 * Mutator para Data de expiração	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setExpirationAppAttribute($value){
		
		if(preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {
			$value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
		}
		$this->attributes['expiration_app'] = $value;
	}
	
	/**
	 * Mutator para Data de expiração	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setExpirationUpdAttribute($value){
		
		if(preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {	
			$value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
		}		
		$this->attributes['expiration_upd'] = $value;
	}
	//--------------------------------------------------------------------------
	// Relations
	//--------------------------------------------------------------------------
    /**
     * Busca o modelo de clients 
	 *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne 
     */
    public function Customer() {
        return $this->hasOne('App\Models\Clients', 'id', 'customer_id')->withDefault();
    }
    /**
     * Busca o modelo de products 
	 *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne 
     */
	public function Product() {
        return $this->hasOne('App\Models\Products', 'id', 'product_id')->withDefault();
    }
    /**
     * Busca o modelo de license_types 
	 *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne 
     */
    public function Type() {
        return $this->hasOne('App\Models\LicenseTypes', 'id', 'type_id')->withDefault();
    }
	
	/**
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function Attributes(){
		return $this->hasMany('App\Models\LicenseAttributes', 'license_id', 'id');
	}
	
	/**
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function Networks(){
		return $this->hasMany('App\Models\LicenseNetworks', 'license_id', 'id');
	}
	
	//--------------------------------------------------------------------------
	// Overrrides
	//--------------------------------------------------------------------------
	public static function boot() {
		
		parent::observe(\App\Observers\LicensesObserver::class);
		parent::boot();
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

		if(app_can('ADMIN')) return true;
		
		$user_id = \Auth::user()->id;

		// Cliente
		if($user_id == $this->Customer->User->id) return true;
		
		// Revendedor
		if($user_id == $this->Customer->Reseller->User->id) return true;	
		
		// Distribuidor
		if($user_id == $this->Customer->Reseller->Distributor->User->id) return true;	

		app_abort('403', __('Vão não tem permissão para acesso')); 
    }
    
    /**
     * Realiza a consulta da tabela
     *
     * @param array $filter
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function search(array $filter = [], $expression = 'licenses.*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);

        if(array_has($filter, 'product_id')) {
            $builder->where('product_id', array_get($filter, 'product_id'));
        }
           
        if(array_has($filter, 'type_id')) {
            $builder->where('type_id', array_get($filter, 'type_id'));
        }
           
        if(array_has($filter, 'customer_id')) {
            $builder->where('customer_id', array_get($filter, 'customer_id'));
        }
           
        if(array_has($filter, 'count')) {
            $builder->where('count', array_get($filter, 'count'));
        }
           
        if(array_has($filter, 'expiration_app')) {
            $builder->where('expiration_app', array_get($filter, 'expiration_app'));
        }
		
		if(array_has($filter, 'status')) {
            $builder->where('status', array_get($filter, 'status'));
        }
           
		if(app_can('DISTRIBUTOR')) {
		
			$builder->join('clients', 'licenses.customer_id', '=', 'clients.id');
			$builder->join('resellers', 'resellers.id', '=', 'clients.reseller_id');
			$builder->join('distributors', 'distributors.id', '=', 'resellers.distributor_id');
			$builder->where('distributors.user_id', \Auth::user()->id);
		}
		elseif(app_can('RESELLER')){
			
			$builder->join('clients', 'licenses.customer_id', '=', 'clients.id');
			$builder->join('resellers', 'resellers.id', '=', 'clients.reseller_id');
			$builder->where('resellers.user_id', \Auth::user()->id);
		}
		elseif(app_can('CUSTUMER')){
			
			$builder->join('clients', 'licenses.customer_id', '=', 'clients.id');
			$builder->where('clients.user_id', \Auth::user()->id);
		}
        
        if(array_has($filter, 'groupBy')) {
            $builder->orderBy(array_get($filter, 'groupBy'), 'ASC');
        }
		
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
		
	/**
	 * Retorna todos os envolvidos com a licenças selecionada
	 * 
	 * @return Illuminate\Support\Collection [ Users ]
	 */
	public function stakeholders(){
		
		// Seleciona todos os usuários administradores da HSC
		$collection = \App\Models\Users::query()
			->whereExists(function($builder){
				$builder->select(\DB::raw(1))
					->from('user_acls')
					->whereRaw('user_acls.user_id = users.`id` AND acl_id IN(SELECT id FROM `acls` WHERE `uid` = "ADMIN")');
			})
			->get();

		// Adiciona o cliente
		$collection->add($this->Customer->User);
		// Adiciona o revendedor
		$collection->add($this->Customer->Reseller->User);	
		// Adiciona o distribuidor
		$collection->add($this->Customer->Reseller->Distributor->User);
		
		return $collection;
	}
	
	public function getStorageFileName(){
		
		return 'private/'.md5($this->id).'.zl';
	}
	
	/**
	 * Verifica se a licença esta próxima de expirar
	 * 
	 * @param string $expr Expressão para projetar data futura
	 * @return bool
	 */
	public function isNearToExpires($expr = 'today + 30 days'){
		
		return (strtotime($this->expiration_app.' 00:00:00') == strtotime($expr));
	}
}
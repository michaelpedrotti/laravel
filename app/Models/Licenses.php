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
        'count',
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
        'customer_id' => 'integer',
        'count' => 'integer',
        'expiration' => 'data',
        'hash' => 'string',
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
        'expiration' => 'Data de expiração',
        'hash' => 'Chave',
    ];
	
	/**
	 * Mutator para Data de expiração	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setExpirationAttribute($value){
		
		if(preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {
			
			$value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
		}
		
		$this->attributes['expiration'] = $value;
	}
	
    

    /**
     * Busca o modelo de clients 
	 *
     * @return clients 
     */
    public function Custumer() {
        return $this->hasOne('App\Models\Clients', 'id', 'customer_id')->withDefault();
    }
    /**
     * Busca o modelo de products 
	 *
     * @return products 
     */
    public function Product() {
        return $this->hasOne('App\Models\Products', 'id', 'product_id')->withDefault();
    }
    /**
     * Busca o modelo de license_types 
	 *
     * @return license_types 
     */
    public function Type() {
        return $this->hasOne('App\Models\LicenseTypes', 'id', 'type_id')->withDefault();
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
           
        if(array_has($filter, 'expiration')) {
            $builder->where('expiration', array_get($filter, 'expiration'));
        }
           
		if(app_has_permission('DISTRIBUTOR')) {
		
			$builder->join('clients', 'licenses.customer_id', '=', 'clients.id');
			$builder->join('resellers', 'resellers.id', '=', 'clients.reseller_id');
			$builder->join('distributors', 'distributors.id', '=', 'resellers.distributor_id');
			$builder->where('distributors.user_id', \Auth::user()->id);
		}
		elseif(app_has_permission('RESELLER')){
			
			$builder->join('clients', 'licenses.customer_id', '=', 'clients.id');
			$builder->join('resellers', 'resellers.id', '=', 'clients.reseller_id');
			$builder->where('clients.user_id', \Auth::user()->id);
		}
        
        if(array_has($filter, 'groupBy')) {
            $builder->orderBy(array_get($filter, 'groupBy'), 'ASC');
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
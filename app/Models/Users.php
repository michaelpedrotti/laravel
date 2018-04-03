<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Users
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 17/01/2018
 */
class Users extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'users';
    public $timestamps = true;
	    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'name',
        'email',
        'password',
        'remember_token',
		'acl_id',
		'first_login'
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
		'acl_id' => 'integer',
		'first_login' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'name' => 'Nome',
        'email' => 'E-mail',
        'password' => 'Senha',
        'remember_token' => 'Token',
		'first_login' => 'Primeiro Login'
    ];
	
    /**
	 * Mutator para Data de expiração	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setPasswordAttribute($value){
		
		$this->addHidden(['password_plain' => $value]); 
		$this->attributes['password'] = bcrypt($value);
	}
	
	public function getCurrentAcl(){
		
		$model = Acls::select('acls.*')
			->join('user_acls', 'user_acls.acl_id', 'acls.id')
			->where('user_acls.user_id', $this->id)
				->get()
					->first();
		
		if(empty($model)) {
			$model = Acls::where('uid', 'ADMIN')->first();
		}
		
		return $model;
	}
	
	public function Distributor(){
		return $this->hasOne('\App\Models\Distributors', 'distributor_id', 'id')->withDefault();
	}

    /**
     * Relations com Acls 
	 *     
	 * @return Acls     
	 */
    public function Acls() {
        return $this->hasMany('\App\Models\UserAcls', 'user_id', 'id');
    }
	
    public function UserAcl() {
        return $this->hasOne('\App\Models\UserAcls', 'user_id', 'id');
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
           
        if(array_key_exists('name', $filter) && !empty($filter['name'])) {
            $builder->where('name', $filter['name']);
        }
           
        if(array_key_exists('email', $filter) && !empty($filter['email'])) {
            $builder->where('email', $filter['email']);
        }
           
        if(array_key_exists('password', $filter) && !empty($filter['password'])) {
            $builder->where('password', $filter['password']);
        }
           
        if(array_key_exists('remember_token', $filter) && !empty($filter['remember_token'])) {
            $builder->where('remember_token', $filter['remember_token']);
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
		
	public static function boot() {
		
		parent::observe(\App\Observers\UsersObserver::class);
		parent::boot();
	}
}
<?php
namespace App\Models;
/**
 * Class Users
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 12/01/2018
 */
class Users extends \Illuminate\Database\Eloquent\Model {
    
    public $table = 'users';
    
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
        'created_at',
        'updated_at',
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
        'created_at' => 'data_tempo',
        'updated_at' => 'data_tempo',
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
        'created_at' => 'Data de criação',
        'updated_at' => 'Data de atualização',
    ];
    
    /*
     * Busca o modelo de Profile
     * @return object Profile
    */
    public function Profile() {
        return $this->belongsToMany('App\Models\Profile', 'users_profile', 'user_id', 'profile_id');
    }

    /**
     * Verifica se o usuário tem permissão pra acessar o registro
     *
     * @return null
     */
    public function authorize(){
    
        if(!empty($this->id)) {

            $builder = self::select();
            $builder->from($this->table.' AS a'); 
            $builder->where('a.id', $this->id);
            //$builder->where('a.user_id', \Auth::user()->id);

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
    public function search(array $filter = [], $expression = 'a.*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = static::selectRaw($expression);
        $builder->from($this->getTable().' AS a');

           
        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('a.id', $filter['id']);
        }
           
        if(array_key_exists('name', $filter) && !empty($filter['name'])) {
            $builder->where('a.name', $filter['name']);
        }
           
        if(array_key_exists('email', $filter) && !empty($filter['email'])) {
            $builder->where('a.email', $filter['email']);
        }
           
        if(array_key_exists('password', $filter) && !empty($filter['password'])) {
            $builder->where('a.password', $filter['password']);
        }
           
        if(array_key_exists('remember_token', $filter) && !empty($filter['remember_token'])) {
            $builder->where('a.remember_token', $filter['remember_token']);
        }
        
        
        $builder->orderBy('a.id', 'DESC');
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
}
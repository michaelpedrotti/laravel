<?php
namespace App\Models;

use App\Models\ModelControl;

/**
 * Class UsersProfile
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 12/01/2018
 */
class UsersProfile extends ModelControl {
    
    public $table = 'users_profile';
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'profile_id',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'profile_id' => 'integer',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'user_id' => 'user_id',
        'profile_id' => 'profile_id',
    ];
    
    /*
     * Busca o modelo de profile
     * @return object profile
    */
    public function Profile() {
        return $this->belongsTo('App\Models\Profile', 'id', 'profile_id');
    }

    /*
     * Busca o modelo de users
     * @return object users
    */
    public function Users() {
        return $this->belongsTo('App\Models\Users', 'id', 'user_id');
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
    public function consultar(array $filter = [], $expression = 'a.*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);
        $builder->from($this->getTable().' AS a');

           
        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('a.id', $filter['id']);
        }
           
        if(array_key_exists('user_id', $filter) && !empty($filter['user_id'])) {
            $builder->where('a.user_id', $filter['user_id']);
        }
           
        if(array_key_exists('profile_id', $filter) && !empty($filter['profile_id'])) {
            $builder->where('a.profile_id', $filter['profile_id']);
        }
        
        
        $builder->orderBy('a.id', 'DESC');
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder->get();
    }
}
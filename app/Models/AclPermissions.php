<?php
namespace App\Models;


/**
 * Class AclPermissions
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 17/01/2018
 */
class AclPermissions extends \Illuminate\Database\Eloquent\Model {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'acl_permissions';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'acl_id',
        'permission_id',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acl_id' => 'integer',
        'permission_id' => 'integer',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'acl_id' => 'Perfil',
        'permission_id' => 'Permissão',
    ];
	
	
    

    /**
     * Busca o modelo de acls     * @return acls     */;
    public function Acls() {'.PHP_EOL;
        return $this->belongsTo('App\Models\Acls', 'id', 'acl_id');
    }
    /**
     * Busca o modelo de permissions     * @return permissions     */;
    public function Permissions() {'.PHP_EOL;
        return $this->belongsTo('App\Models\Permissions', 'id', 'permission_id');
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
           
        if(array_key_exists('acl_id', $filter) && !empty($filter['acl_id'])) {
            $builder->where('acl_id', $filter['acl_id']);
        }
           
        if(array_key_exists('permission_id', $filter) && !empty($filter['permission_id'])) {
            $builder->where('permission_id', $filter['permission_id']);
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
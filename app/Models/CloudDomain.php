<?php
namespace App\Models;


/**
 * Class CloudDomain
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 15/01/2018
 */
class CloudDomain extends \Illuminate\Database\Eloquent\Model {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'cloud_domain';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'point',
        'domain',
        'server',
        'port',
        'enabled',
        'userId',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'point' => 'integer',
        'domain' => 'string',
        'server' => 'string',
        'port' => 'integer',
        'enabled' => 'enum',
        'userId' => 'integer',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'point' => 'Ponto de Acesso',
        'domain' => 'Domínio',
        'server' => 'Servidor',
        'port' => 'Porta',
        'enabled' => 'Ativo',
        'userId' => 'Usuário',
    ];
    


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
           
        if(array_key_exists('point', $filter) && !empty($filter['point'])) {
            $builder->where('point', $filter['point']);
        }
           
        if(array_key_exists('domain', $filter) && !empty($filter['domain'])) {
            $builder->where('domain', $filter['domain']);
        }
           
        if(array_key_exists('server', $filter) && !empty($filter['server'])) {
            $builder->where('server', $filter['server']);
        }
           
        if(array_key_exists('port', $filter) && !empty($filter['port'])) {
            $builder->where('port', $filter['port']);
        }
           
        if(array_key_exists('enabled', $filter) && !empty($filter['enabled'])) {
            $builder->where('enabled', $filter['enabled']);
        }
           
        if(array_key_exists('userId', $filter) && !empty($filter['userId'])) {
            $builder->where('userId', $filter['userId']);
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
<?php
namespace App\Models;


/**
 * Class AlertUsers
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 15/03/2018
 */
class AlertUsers extends \Eloquent {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'alert_users';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'alert_id',
        'user_id',
        'readed',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'alert_id' => 'integer',
        'user_id' => 'integer',
        'readed' => 'enum',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'alert_id' => 'Alerta',
        'user_id' => 'Usuário',
        'readed' => 'Lida',
    ];
	
	
    

    /**
     * Busca o modelo de alerts 
	 *
     * @return alerts 
     */
    public function Alert() {
        return $this->hasOne('App\Models\Alerts', 'id', 'alert_id');
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
                app_abort(403, trans('Acesso negado para este Usuários da mensagem'));
            }
        } 
    }
    
    
    /**
     * Realiza a consulta da tabela
     *
     * @param array $filter
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function search(array $filter = [], $expression = '*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);

           
        if(array_has($filter, 'id')) {
            $builder->where('id', array_get($filter, 'id'));
        }
           
        if(array_has($filter, 'alert_id')) {
            $builder->where('alert_id', array_get($filter, 'alert_id'));
        }
           
        if(array_has($filter, 'user_id')) {
            $builder->where('user_id', array_get($filter, 'user_id'));
        }
           
        if(array_has($filter, 'readed')) {
            $builder->where('readed', array_get($filter, 'readed'));
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
}
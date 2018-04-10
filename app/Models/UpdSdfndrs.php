<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class UpdSdfndrs
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 27/03/2018
 */
class UpdSdfndrs extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'upd_sdfndrs';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'type',
        'value',
        'status',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'type' => 'enum',
        'value' => 'string',
        'status' => 'enum',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'user_id' => 'Usuário',
        'type' => 'Tipo',
        'value' => 'Valor',
        'status' => 'Situação',
    ];
	
	public $types = [
		'URL' => 'Url',
		'DOM' => 'Domínio',
		'REGX' => 'Expressão Regular',
		'FILE' => 'Arquivo',
		'IP' => 'IP',
		'NET' => 'Rede'
	];
    
	public $arrStatus = [
		'SECURE' => 'Confiável', 
		'UNSECURE' => 'Não confiável'
	];
	

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
                app_abort(403, trans('Acesso negado para este Smart Defender'));
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
           
        if(array_has($filter, 'user_id')) {
            $builder->where('user_id', array_get($filter, 'user_id'));
        }
           
        if(array_has($filter, 'type')) {
            $builder->where('type', array_get($filter, 'type'));
        }
           
        if(array_has($filter, 'value')) {
            $builder->where('value', array_get($filter, 'value'));
        }
           
        if(array_has($filter, 'status')) {
            $builder->where('status', array_get($filter, 'status'));
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
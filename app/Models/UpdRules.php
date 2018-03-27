<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class UpdRules
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 26/03/2018
 */
class UpdRules extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'upd_rules';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'type',
        'name',
        'value',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'value' => 'text',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'type' => 'Tipo',
        'name' => 'Nome',
        'value' => 'Valor',
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
                app_abort(403, trans('Acesso negado para esta Regra'));
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
           
        if(array_has($filter, 'type')) {
            $builder->where('type', array_get($filter, 'type'));
        }
           
        if(array_has($filter, 'name')) {
            $builder->where('name', 'LIKE', '%'.array_get($filter, 'name').'%');
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
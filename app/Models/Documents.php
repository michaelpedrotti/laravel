<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Documents
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class Documents extends \Illuminate\Database\Eloquent\Model {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'documents';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'type_id',
        'name',
        'mimetyppe',
        'size',
        'hash',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_id' => 'integer',
        'name' => 'string',
        'mimetyppe' => 'string',
        'size' => 'integer',
        'hash' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'type_id' => 'Tipo',
        'name' => 'Nome',
        'mimetyppe' => 'Mime-Type',
        'size' => 'Tamanho',
        'hash' => 'Storage',
    ];
	
	
    

    /**
     * Busca o modelo de document_types     * @return document_types     */;
    public function DocumentTypes() {'.PHP_EOL;
        return $this->belongsTo('App\Models\DocumentTypes', 'id', 'type_id');
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
           
        if(array_key_exists('type_id', $filter) && !empty($filter['type_id'])) {
            $builder->where('type_id', $filter['type_id']);
        }
           
        if(array_key_exists('name', $filter) && !empty($filter['name'])) {
            $builder->where('name', $filter['name']);
        }
           
        if(array_key_exists('mimetyppe', $filter) && !empty($filter['mimetyppe'])) {
            $builder->where('mimetyppe', $filter['mimetyppe']);
        }
           
        if(array_key_exists('size', $filter) && !empty($filter['size'])) {
            $builder->where('size', $filter['size']);
        }
           
        if(array_key_exists('hash', $filter) && !empty($filter['hash'])) {
            $builder->where('hash', $filter['hash']);
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
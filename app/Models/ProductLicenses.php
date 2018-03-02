<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ProductLicenses
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 16/02/2018
 */
class ProductLicenses extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'product_licenses';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'product_id',
        'filename',
        'mimetype',
        'size',
        'extension',
        'hash',
		'stream'
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'filename' => 'string',
        'mimetype' => 'string',
        'size' => 'integer',
        'extension' => 'string',
        'hash' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'product_id' => 'Produto',
        'filename' => 'Nome do arquivo',
        'mimetype' => 'Mime-Type',
        'size' => 'Tamanho',
        'extension' => 'Extensão',
        'hash' => 'Chave',
		'stream' => 'Stream'
    ];
	
    /**
     * Busca o modelo de products 
	 *
     * @return products 
     */
    public function Product() {
        return $this->hasOne('App\Models\Products', 'id', 'product_id')->withDefault();
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
                app_abort(403, trans('Acesso negado para esta Licença do produto'));
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
           
        if(array_has($filter, 'product_id')) {
            $builder->where('product_id', array_get($filter, 'product_id'));
        }
           
        if(array_has($filter, 'filename')) {
            $builder->where('filename', array_get($filter, 'filename'));
        }
           
        if(array_has($filter, 'mimetype')) {
            $builder->where('mimetype', array_get($filter, 'mimetype'));
        }
           
        if(array_has($filter, 'size')) {
            $builder->where('size', array_get($filter, 'size'));
        }
           
        if(array_has($filter, 'extension')) {
            $builder->where('extension', array_get($filter, 'extension'));
        }
           
        if(array_has($filter, 'hash')) {
            $builder->where('hash', array_get($filter, 'hash'));
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
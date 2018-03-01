<?php
namespace App\Models;


/**
 * Class ProductAttributes
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 22/02/2018
 */
class ProductAttributes extends \Eloquent {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'product_attributes';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'product_id',
        'name',
        'key',
		'default'
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'name' => 'string',
        'key' => 'string',
		'default' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'product_id' => 'Produto',
        'name' => 'Nome',
        'key' => 'Atributo',
		'default' => 'Valor padrão'
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
                app_abort(403, trans('Acesso negado para este Atributo do produto'));
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
           
        if(app_has($filter, 'product_id')) {
            $builder->where('product_id', array_get($filter, 'product_id'));
        }
           
        if(array_has($filter, 'name')) {
            $builder->where('name', array_get($filter, 'name'));
        }
           
        if(array_has($filter, 'key')) {
            $builder->where('key', array_get($filter, 'key'));
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
	
	public function isCheck($license_id = 0){

		$count = \App\Models\LicenseAttributes::select()
			->where('attr_id', $this->id)
			->where('license_id', $license_id)
				->count();

		return $count > 0 ? true : false;
	}
}
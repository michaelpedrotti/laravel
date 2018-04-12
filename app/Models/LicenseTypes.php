<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class LicenseTypes
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class LicenseTypes extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'license_types';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'name',
		'product_id',
		'val'
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
		'product_id' => 'integer',
		'val' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'name' => 'Nome',
		'product_id' => 'Produto',
		'val' => 'Valor'
    ];
	
	
    
    /**
     * Busca o modelo de licenses     * @return licenses     */
    public function Licenses() {
        return $this->hasMany('App\Models\Licenses', 'type_id', 'id');
    }

	public function Product(){
		return $this->hasOne('App\Models\Products', 'id', 'product_id');
	}
	
	public function Attributes(){
		return $this->hasMany('App\Models\ProductAttributes', 'id', 'product_id');
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
 
        if(array_has($filter, 'id')) {
            $builder->where('id', $filter['id']);
        }
           
        if(array_has($filter, 'name')) {
            $builder->where('name', 'LIKE', '%'.$filter['name'].'%');
        }
		
        if(array_has($filter, 'product_id')) {
            $builder->where('product_id', $filter['product_id']);
        }
        
        if(array_has($filter, 'orderBy')) {
            $builder->orderBy($filter['orderBy'], 'ASC');
        }
		
		if(array_has($filter, 'groupBy')) {
            $builder->groupBy($filter['groupBy']);
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
}
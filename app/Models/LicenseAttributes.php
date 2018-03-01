<?php
namespace App\Models;


/**
 * Class LicenseAttributes
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 23/02/2018
 */
class LicenseAttributes extends \Eloquent {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'license_attributes';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'license_id',
        'attr_id',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'license_id' => 'integer',
        'attr_id' => 'integer',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'license_id' => 'Licença',
        'attr_id' => 'Atributo do produto',
    ];
	
	
    

    /**
     * Busca o modelo de licenses 
	 *
     * @return licenses 
     */
    public function License() {
        return $this->hasOne('App\Models\Licenses', 'id', 'license_id')->withDefault();
    }
    /**
     * Busca o modelo de product_attributes 
	 *
     * @return product_attributes 
     */
    public function ProductAttr() {
        return $this->hasOne('App\Models\ProductAttributes', 'id', 'attr_id');
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
                app_abort(403, trans('Acesso negado para este Atributo do produto na licença'));
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
           
        if(array_has($filter, 'license_id')) {
            $builder->where('license_id', array_get($filter, 'license_id'));
        }
           
        if(array_has($filter, 'attr_id')) {
            $builder->where('attr_id', array_get($filter, 'attr_id'));
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
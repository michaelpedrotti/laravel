<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Address
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 22/01/2018
 */
class Address extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'address';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'user_id',
        'cep',
        'address',
        'number',
        'city',
        'state',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'cep' => 'string',
        'address' => 'string',
        'number' => 'string',
        'city' => 'string',
        'state' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'user_id' => 'Usuário',
        'cep' => 'CEP',
        'address' => 'Endereço',
        'number' => 'Número',
        'city' => 'Cidade',
        'state' => 'Estado',
    ];
	
	
    

    /**
     * Busca o modelo de users 
	 *
     * @return users 
     */
    public function Users() {
        return $this->belongsTo('App\Models\Users', 'id', 'user_id');
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
           
        if(array_key_exists('user_id', $filter) && !empty($filter['user_id'])) {
            $builder->where('user_id', $filter['user_id']);
        }
           
        if(array_key_exists('cep', $filter) && !empty($filter['cep'])) {
            $builder->where('cep', $filter['cep']);
        }
           
        if(array_key_exists('address', $filter) && !empty($filter['address'])) {
            $builder->where('address', $filter['address']);
        }
           
        if(array_key_exists('number', $filter) && !empty($filter['number'])) {
            $builder->where('number', $filter['number']);
        }
           
        if(array_key_exists('city', $filter) && !empty($filter['city'])) {
            $builder->where('city', $filter['city']);
        }
           
        if(array_key_exists('state', $filter) && !empty($filter['state'])) {
            $builder->where('state', $filter['state']);
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
<?php
namespace App\Models;


/**
 * Class ExtensionRule
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 17/01/2018
 */
class ExtensionRule extends \Illuminate\Database\Eloquent\Model {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'extension_rule';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'to_address',
        'from_address',
        'timestamp',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'to_address' => 'string',
        'from_address' => 'string',
        'timestamp' => 'data_tempo',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'to_address' => 'Barba',
        'from_address' => 'Ramon',
        'timestamp' => 'timestamp',
    ];
	
	/**
	 * Mutator para timestamp	 *
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setTimestampAttribute($value){
		
		if(preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {
			
			$value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
		}
		
		$this->attributes['timestamp'] = $value;
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
           
        if(array_key_exists('to_address', $filter) && !empty($filter['to_address'])) {
            $builder->where('to_address', $filter['to_address']);
        }
           
        if(array_key_exists('from_address', $filter) && !empty($filter['from_address'])) {
            $builder->where('from_address', $filter['from_address']);
        }
           
        if(array_key_exists('timestamp', $filter) && !empty($filter['timestamp'])) {
            $builder->where('timestamp', $filter['timestamp']);
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
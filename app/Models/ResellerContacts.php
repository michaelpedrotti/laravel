<?php
namespace App\Models;


/**
 * Class ResellerContacts
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 21/02/2018
 */
class ResellerContacts extends \Eloquent {
    
    
    protected $primaryKey = 'contact_id';
    
    public $table = 'reseller_contacts';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'contact_id',
        'reseller_id',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'contact_id' => 'integer',
        'reseller_id' => 'integer',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'contact_id' => 'Contato',
        'reseller_id' => 'Revendedor',
    ];
	
	
    

    /**
     * Busca o modelo de contacts 
	 *
     * @return contacts 
     */
    public function Contacts() {
        return $this->belongsTo('App\Models\Contacts', 'id', 'contact_id');
    }
    /**
     * Busca o modelo de resellers 
	 *
     * @return resellers 
     */
    public function Reseller() {
        return $this->hasOne('App\Models\Resellers', 'id', 'reseller_id')->withDefault();
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
                app_abort(403, trans('Acesso negado para este Contato do revendedor'));
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

           
        if(array_has($filter, 'contact_id')) {
            $builder->where('contact_id', array_get($filter, 'contact_id'));
        }
           
        if(array_has($filter, 'reseller_id')) {
            $builder->where('reseller_id', array_get($filter, 'reseller_id'));
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
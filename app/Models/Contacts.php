<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Contacts
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 21/02/2018
 */
class Contacts extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'contacts';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'type',
        'name',
        'email',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'enum',
        'name' => 'string',
        'email' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'type' => 'Tipo',
        'name' => 'Nome',
        'email' => 'E-mail',
    ];
	
	
    


    /**
     * Relations com Clients     * @return Clients     */
    public function Clients() {
        return $this->belongsToMany('App\Models\Clients', 'client_contacts', 'contact_id', 'client_id');
    }

    /**
     * Relations com Distributors     * @return Distributors     */
    public function Distributors() {
        return $this->belongsToMany('App\Models\Distributors', 'distributor_contacts', 'contact_id', 'distributor_id');
    }

    /**
     * Relations com Resellers     * @return Resellers     */
    public function Resellers() {
        return $this->belongsToMany('App\Models\Resellers', 'reseller_contacts', 'contact_id', 'reseller_id');
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
                app_abort(403, trans('Acesso negado para este Contato'));
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
            $builder->where('name', array_get($filter, 'name'));
        }
           
        if(array_has($filter, 'email')) {
            $builder->where('email', array_get($filter, 'email'));
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
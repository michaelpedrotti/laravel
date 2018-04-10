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
        'type' => 'Contato',
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
            $builder->where('name', 'LIKE', '%'.array_get($filter, 'name').'%');
        }
           
        if(array_has($filter, 'email')) {
            $builder->where('email', 'LIKE', '%'.array_get($filter, 'email').'%');
        }
        
		// /contacts/distributors/1/form/5
		// /contacts/{entity}/{fk_id}/{action}/{id}
		$params = \Route::getCurrentRoute()->parameters();
		
		if(app_has($params, 'entity') && app_has($params, 'fk_id')){
			
			switch($params['entity']) {

				case 'clients':
					$builder->join('client_contacts', 'client_contacts.contact_id', 'contacts.id');
					$builder->where('client_contacts.client_id', $params['fk_id']);
					break;
				
				case 'distributors':
					$builder->join('distributor_contacts', 'distributor_contacts.contact_id', 'contacts.id');
					$builder->where('distributor_contacts.distributor_id', $params['fk_id']);
					break;
				
				case 'resellers':
					$builder->join('reseller_contacts', 'reseller_contacts.contact_id', 'contacts.id');
					$builder->where('reseller_contacts.reseller_id', $params['fk_id']);
					break;
				
			}
		}
		    
        if(array_has($filter, 'groupBy')) {
            $builder->orderBy(array_get($filter, 'groupBy'), 'ASC');
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
	
	public function save(array $options = array()) {
		
		if(!parent::save($options)) return false;
		
		$params = \Route::getCurrentRoute()->parameters();
		
		if(app_has($params, 'entity') && app_has($params, 'fk_id')){
			
			switch($params['entity']) {

				case 'clients':
					$model = ClientContacts::findOrNew($this->id);
					$model->fill(['contact_id' => $this->id, 'client_id' => $params['fk_id']]);
					break;
				
				case 'distributors':
					$model = DistributorContacts::findOrNew($this->id);
					$model->fill(['contact_id' => $this->id, 'distributor_id' => $params['fk_id']]);
					break;
				
				case 'resellers':
					$model = ResellerContacts::findOrNew($this->id);
					$model->fill(['contact_id' => $this->id, 'reseller_id' => $params['fk_id']]);
					break;
				
				default:
					return false;
				
			}
			
			return $model->save();
		}
		
		return true;
	}
	
	public function getOwnerName(){
		
		$name = '';
		$params = \Route::getCurrentRoute()->parameters();
		
		if(app_has($params, 'entity') && app_has($params, 'fk_id')){
			
			switch($params['entity']) {

				case 'clients':
					$model = ClientContacts::select()
						->where('client_id', $params['fk_id'])
							->firstOrNew([])
								->Client
									->User
										->name;
					break;
				
				case 'distributors':
					$model = DistributorContacts::select()
						->where('distributor_id', $params['fk_id'])
							->firstOrNew([])
								->Distributor
									->User
										->name;
					break;
				
				case 'resellers':
					$name = ResellerContacts::select()
						->where('reseller_id', $params['fk_id'])
							->firstOrNew([])
								->Reseller
									->User
										->name;
					break;
			}
			
			return $name;
		}
	}
	
	public function getTypes(){
		
		return [
			'INTERNAL' => __('Interno'), 
			'TECHNICAL' => __('Técnico'), 
			'SIMPLE' => __('Contato')
		];
	}
}
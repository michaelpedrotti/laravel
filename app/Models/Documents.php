<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Documents
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class Documents extends \Eloquent {
    
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
		'acl_id',
        'name',
		'extension',
        'mimetype',
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
		'acl_id' => 'integer',
        'name' => 'string',
		'extension' => 'string',
        'mimetype' => 'string',
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
		'acl_id' => 'Perfil',
        'name' => 'Nome',
		'extension' => 'Extensão',
        'mimetype' => 'Mime-Type',
        'size' => 'Tamanho',
        'hash' => 'Anexo',
    ];
	
    /**
	 * Mutator para Data de expiração	 
	 * 
	 * @link https://laravel.com/docs/5.5/eloquent-mutators 
	 */
	public function setHashAttribute($value){
				
		$this->attributes['hash'] = preg_replace('/^public\//', '', $value);
	}

    /**
     * Busca o modelo de document_types     
	 * 
	 * @return Illuminate\Database\Eloquent\Relations\HasOne     
	 */
    public function DocumentTypes() {
        return $this->hasOne('App\Models\DocumentTypes', 'id', 'type_id');
    }
	
	public function Acl() {
        return $this->hasOne('App\Models\Acls', 'id', 'type_id')->withDefault();
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
    
	public function downloadName(){
		
		return sprintf('%s.%s', snake_case($this->name), $this->extension);
	}
	
    /**
     * Realiza a consulta da tabela
     *
     * @param array $filter
     * @return \Illuminate\Support\Collection
     */
    public function search(array $filter = [], $expression = 'documents.*') {
        
        if(empty($filter)) $filter = $this->toArray();
    
        $builder = self::selectRaw($expression);

           
        if(array_key_exists('id', $filter) && !empty($filter['id'])) {
            $builder->where('id', $filter['id']);
        }
           
        if(array_key_exists('type_id', $filter) && !empty($filter['type_id'])) {
            $builder->where('type_id', $filter['type_id']);
        }
           
        if(array_key_exists('name', $filter) && !empty($filter['name'])) {
            $builder->where('name', 'LIKE', '%'.$filter['name'].'%');
        }
           
        if(array_key_exists('mimetype', $filter) && !empty($filter['mimetype'])) {
            $builder->where('mimetype', $filter['mimetype']);
        }
           
        if(array_key_exists('size', $filter) && !empty($filter['size'])) {
            $builder->where('size', $filter['size']);
        }
           
        if(array_key_exists('hash', $filter) && !empty($filter['hash'])) {
            $builder->where('hash', $filter['hash']);
        }
		
		
		if(app_can('DISTRIBUTOR')) {
		
			$builder->join('acls', 'acls.id', '=', 'documents.acl_id');
			$builder->whereIn('acls.uid', ['DISTRIBUTOR', 'RESELLER', 'CUSTUMER']);
		}
		elseif(app_can('RESELLER')){
			
			$builder->join('acls', 'acls.id', '=', 'documents.acl_id');
			$builder->whereIn('acls.uid', ['RESELLER', 'CUSTUMER']);
		}
		elseif(app_can('CUSTUMER')){
			
			$builder->join('acls', 'acls.id', '=', 'documents.acl_id');
			$builder->whereIn('acls.uid', ['CUSTUMER']);
		}
        
        if(array_key_exists('orderBy', $filter) && !empty($filter['orderBy'])) {
            $builder->orderBy($filter['orderBy'], 'ASC');
        }
        
        // Grava em laravel.log
        //
        //\Log::info($builder->getBindings());
        //\Log::info($builder->toSql());

        return $builder;
    }
	
	public function save(array $options = array()) {
		
		$file = \Illuminate\Support\Facades\Input::file('attach');
		
		if(!empty($file)) {
			
			$this->extension = $file->getClientOriginalExtension();
			$this->mimetype = $file->getClientMimeType();
			$this->size = $file->getSize();
			$this->hash = $file->store('public');
			
		}

		return parent::save($options);
	}
}
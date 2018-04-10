<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Products
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class Products extends \Eloquent {
    
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    public $table = 'products';
    public $timestamps = true;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'name',
        'version',
		'uid'
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'version' => 'string',
		'uid' => 'string'
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'name' => 'Nome',
        'version' => 'Versão',
		'uid' => 'Identificador'
    ];
	
	
    
    /**
     * Busca o modelo de licenses
	 *      
	 * @return Illuminate\Database\Eloquent\Relations\HasOne     
	 */
    public function License() {
        return $this->hasOne('App\Models\ProductLicenses', 'product_id', 'id')->withDefault();
    }
	
	public function Attributes(){
		return $this->hasMany('App\Models\ProductAttributes', 'product_id', 'id');
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
           
        if(array_key_exists('name', $filter) && !empty($filter['name'])) {
            $builder->where('name', 'LIKE', '%'.$filter['name'].'%');
        }
           
        if(array_key_exists('version', $filter) && !empty($filter['version'])) {
            $builder->where('version', 'LIKE', '%'.$filter['version'].'%');
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
		
		if(!parent::save($options)) return false;
			
		//----------------------------------------------------------------------
		// Salvar o anexo no store
		//----------------------------------------------------------------------
		$file = \Illuminate\Support\Facades\Input::file('key');
            
        if(!empty($file)) {
			
			$model = ProductLicenses::query()
				->where('product_id', $this->id)
					->firstOrNew([]);
			
			$model->fill([
				'product_id' => $this->id,
				'filename' => $file->getClientOriginalName(),
				'mimetype' => $file->getClientMimeType(),
				'size' => $file->getSize(),
				'extension' => $file->getClientOriginalExtension(),
				'hash' => $file->store('public'),
				'stream' => \File::get($file->getRealPath())
			]);
			
			$model->save();
		}
		//----------------------------------------------------------------------
		// Salvar atributos do produto
		\App\Models\ProductAttributes::select()
			->where('product_id', $this->id)
				->delete();

		foreach(json_decode(request('attributes', '[]'), true) as $row){
			
			\App\Models\ProductAttributes::create([
				'product_id' => $this->id,
				'name' => $row['name'],
				'key' => $row['key']
			]);
		}
		//----------------------------------------------------------------------
		
		return true;
	}
}
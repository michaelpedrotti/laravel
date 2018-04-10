<?php
namespace App\Models;


/**
 * Class Permissions
 * @package App\Models
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class Permissions extends \Illuminate\Database\Eloquent\Model {
    
    
    protected $primaryKey = 'id';
    
    public $table = 'permissions';
    public $timestamps = false;
    
    /**
     * Variaveis seguras para uso e guardar dados 
     * @var array 
     */
    public $fillable = [
        'id',
        'permission',
        'desc',
    ];
    
    /**
     * Tipos nativos dos atributos
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'permission' => 'string',
        'desc' => 'string',
    ];    
    
    /**
     * Label dos atributos
     * @var array 
     */
    public $labels = [
        'id' => 'ID',
        'permission' => 'Permissão',
        'desc' => 'Descrição',
    ];
	
	
    


    /**
     * Relations com Acls     * @return Acls     */
    public function Acls() {
        return $this->belongsToMany('App\Models\Acls', 'acl_permissions', 'permission_id', 'acl_id');
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
           
        if(array_key_exists('permission', $filter) && !empty($filter['permission'])) {
            $builder->where('permission', $filter['permission']);
        }
           
        if(array_key_exists('desc', $filter) && !empty($filter['desc'])) {
            $builder->where('desc', 'LIKE', '%'.$filter['desc'].'%');
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
	
	/**
	 * Adicionas as permissiões
	 * 
	 * @return null
	 */
	public static function setSession(){
	
		$session = app('session.store');
		
		$model = \App\Models\Users::find(\Auth::user()->id);
		$collection = $model->Acls;

		if($collection && $collection->count() > 0){

			$collection = $collection->first()->Acls;
			if($collection && $collection->count() > 0){
				
				$model = $collection->first();
				
				$session->put('acl', $model->uid);
				$session->put('permissions', static::select()
					->from('acl_permissions AS a')
					->join('permissions AS b', 'b.id', 'a.permission_id')
					->where('a.acl_id', $model->id)
						->pluck('a.permission')
							->toArray()
				);
			}
		}
	}
}
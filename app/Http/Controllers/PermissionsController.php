<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsFormRequest as FormRequest;
use App\Models\Permissions as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Permissão do perfil
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class PermissionsController extends Controller {
        
    /**
     * Monta a listagem dos Permissões do perfil
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {

        $this->authorize('PERMISSIONS_LIST');
        
		$model = Model::getModel()->fill($request->all());
		
		// $request->route('id')
		
        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())
				->addColumn('check', function($query) use($request){
					
					$count = \App\Models\AclPermissions::query()
						->where('permission_id', $query->id)
						->where('acl_id', $request->route('id'))
							->count();
					
					return $count > 0 ? true : false;
					
				})
				->make(true);
        }
		
		if(empty($request->route('id'))) {
			
			$this->setMessage('Nenhum perfil foi especificado', 'warning');
			return redirect(url('/home'));
		}
       
        return view('permissions.index', [
            'model' => $model,
			'acl' => \App\Models\Acls::findOrNew($request->route('id'))
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Permissão do perfil
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
		
		$output = ['success' => false];
		
        $this->authorize(($request->route('id') ? 'PERMISSIONS_EDIT' : 'PERMISSIONS_ADD'));
        
		if($request->isMethod('post')) {
			
			$model = \App\Models\AclPermissions::query()
				->where('permission_id', $request->get('permission_id'))
				->where('acl_id', $request->get('acl_id'))
					->get()
						->first();

			if(!$model) $model = \App\Models\AclPermissions::newModelInstance($request->all());
		
            $model->getConnection()->beginTransaction();

            try {
			    
				if($request->get('action') == 'REM') {
					$model->delete();
				}
				else {
					$model->save();
				}
				
                $model->getConnection()->commit();
                
                $output['success'] = true;
            }
            catch(\Exception $e) {
				$output['msg'] = $e->getMessage();
            }            
        }
    
		return \Response::json($output);
    }

    /**
     * Mostra o detalhe
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function show(Request $request) {
    
        $this->authorize('PERMISSIONS_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('permissions.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Permissão do perfil
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('PERMISSIONS_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Permissão do perfil foi especificado');
			}
			
			$model->query()
				->whereIn($model->getKeyName(), $ids)
					->get()
						->each(function($model){ 
							//$model->authorize($model->id);
							$model->delete(); 
						});
			
            $model->getConnection()->commit();

            $output['success'] = true;
            $output['msg'] = (count($ids) > 1) ? 'Permissões do perfil foram excluídos com sucesso' : 'Permissão do perfil foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

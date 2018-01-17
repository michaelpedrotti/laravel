<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExtensionRuleFormRequest as FormRequest;
use App\Models\ExtensionRule as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Extensão por regra
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class ExtensionRuleController extends Controller {
        
    /**
     * Monta a listagem dos Extensões por regras
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        //$this->authorize('EXTENSIONRULE_LISTAR', 'PermissaoPolicy');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				//->editColumn('to_address', function ($query) {
				//	return $query->to_address;
				//})
				//->editColumn('from_address', function ($query) {
				//	return $query->from_address;
				//})
				->editColumn('timestamp', function ($query) {
					return \DateTime::createFromFormat('Y-m-d H:i:s', $query->timestamp)->format('d/m/Y H:i:s');
				})
				->make(true);
        }
       
        return view('extension-rule.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Extensão por regra
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        //$this->authorize(($request->route('id') ? 'EXTENSIONRULE_EDITAR' : 'EXTENSIONRULE_CADASTRAR'), 'PermissaoPolicy');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('extension-rule.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Extensão por regra foi salva com sucesso!', 'success'); 
            }
			catch(ValidationException $e){
                
                $view->withErrors($e->validator);
				$this->setMessage('Verifique os campos', 'warning');
            }
            catch(\Exception $e) {
                
                $model->getConnection()->rollBack();
                $this->setMessage($e->getMessage(), 'danger');                
            }            
        }
    
        return $view;
    }

    /**
     * Mostra o detalhe
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function show(Request $request) {
    
        //$this->authorize('EXTENSIONRULE_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('extension-rule.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Extensão por regra
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        //$this->authorize('EXTENSIONRULE_EXCLUIR', 'PermissaoPolicy');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Extensão por regra foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Extensões por regras foram excluídos com sucesso' : 'Extensão por regra foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdRulesFormRequest as FormRequest;
use App\Models\UpdRules as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Regra
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class UpdRulesController extends Controller {
        
    /**
     * Monta a listagem das Regras
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('UPDRULES_LIST');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search($request->all()))
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				//->editColumn('type', function ($query) {
				//	return $query->type;
				//})
				//->editColumn('name', function ($query) {
				//	return $query->name;
				//})
				->editColumn('value', function ($query) {
					return substr($query->value, 0, 50);
				})
				->make(true);
        }
       
        return view('upd-rules.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar uma Regra
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'UPDRULES_EDIT' : 'UPDRULES_ADD'));
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('upd-rules.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Regra foi salva com sucesso!', 'success'); 
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
    
        $this->authorize('UPDRULES_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('upd-rules.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir uma Regra
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('UPDRULES_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Regra foi especificada');
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
            $output['msg'] = (count($ids) > 1) ? 'Regras foram excluídos com sucesso' : 'Regra foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

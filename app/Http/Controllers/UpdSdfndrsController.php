<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdSdfndrsFormRequest as FormRequest;
use App\Models\UpdSdfndrs as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Smart Defender
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class UpdSdfndrsController extends Controller {
        
    /**
     * Monta a listagem dos Smart Defender
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('UPDSDFNDRS_LIST');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search($request->all()))
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				->editColumn('user_id', function ($query) {
					return $query->User->name;
				})
				->editColumn('type', function ($query) {
					return array_get($query->types, $query->type, $query->type);
				})
				//->editColumn('value', function ($query) {
				//	return $query->value;
				//})
				->editColumn('status', function ($query) {
					return array_get($query->arrStatus, $query->status, $query->status);
				})
				->make(true);
        }
       
        return view('upd-sdfndrs.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Smart Defender
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'UPDSDFNDRS_EDIT' : 'UPDSDFNDRS_ADD'));
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('upd-sdfndrs.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
				$model->user_id = \Auth::user()->id;
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Smart Defender foi salva com sucesso!', 'success'); 
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
    
        $this->authorize('UPDSDFNDRS_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('upd-sdfndrs.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Smart Defender
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('UPDSDFNDRS_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Smart Defender foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Smart Defender foram excluídos com sucesso' : 'Smart Defender foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

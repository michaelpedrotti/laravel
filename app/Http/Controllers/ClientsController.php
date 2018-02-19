<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsFormRequest as FormRequest;
use App\Models\Clients as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Cliente
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class ClientsController extends Controller {
        
    /**
     * Monta a listagem dos Clientes
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('CLIENTS_LIST');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {

            $engine = Datatables::eloquent($model->search($request->all()))
				->editColumn('user', function ($query) {
					return $query->User->name;
				})
				->editColumn('reseller_id', function ($query) {
					return $query->Reseller->User->name;
				});
			
			if(app_can('ADMIN')) {
				
				$engine->editColumn('distributor_id', function ($query) {
					return $query->Reseller->Distributor->User->name;
				});
			}	
			
			return $engine->make(true);
        }
       
        return view('clients.index', [
            'model' => $model,
			'columns' => $model->getColumns()
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Cliente
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'CLIENTS_EDIT' : 'CLIENTS_ADD'));
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('clients.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->storage($request->all());
                $model->getConnection()->commit();
                
                $this->setMessage('Cliente foi salva com sucesso!', 'success'); 
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
		
		$view->with('resellers', \App\Models\Resellers::getModel()->toHash($model->Reseller->distributor_id));
    
        return $view;
    }

    /**
     * Mostra o detalhe
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function show(Request $request) {
    
        $this->authorize('CLIENTS_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('clients.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Cliente
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('CLIENTS_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Cliente foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Clientes foram excluídos com sucesso' : 'Cliente foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

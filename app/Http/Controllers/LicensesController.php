<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\LicensesFormRequest as FormRequest;
use App\Models\Licenses as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Licença
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class LicensesController extends Controller {
        
    /**
     * Monta a listagem das Licenças
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('LICENSES_LIST');
        
		$model = Model::getModel()->fill($request->all());
		$mapper = $model->getStatus();

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search($request->all()))
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				->addColumn('product_id', function ($query) {
					return $query->Product->name;
				})
				->addColumn('type_id', function ($query) {
					return $query->Type->name;
				})
				->addColumn('customer_id', function ($query) {
					return $query->Custumer->User->name;
				})
				//->editColumn('count', function ($query) {
				//	return $query->count;
				//})
				->editColumn('expiration', function ($query) {
					return \DateTime::createFromFormat('Y-m-d', $query->expiration)->format('d/m/Y');
				})
				->editColumn('status', function ($query) use($mapper) {
					return array_get($mapper, $query->status, $query->status);
				})
				->make(true);
        }
       
        return view('licenses.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar uma Licença
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize($request->route('id') ? 'LICENSES_EDIT' : 'LICENSES_ADD');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('licenses.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Licença foi salva com sucesso!', 'success'); 
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

		$view->with('resellers', \App\Models\Resellers::getModel()->toHash($model->Custumer->Reseller->distributor_id));
		$view->with('customers', \App\Models\Clients::getModel()->toHash($model->customer_id));
		
        return $view;
    }

    /**
     * Mostra o detalhe
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function show(Request $request) {
    
        $this->authorize('LICENSES_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('licenses.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir uma Licença
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('LICENSES_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Licença foi especificada');
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
            $output['msg'] = (count($ids) > 1) ? 'Licenças foram excluídos com sucesso' : 'Licença foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
	
    /**
     * Atualiza a situação para aguardando para o script do artisan gerar a chave
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function update(Request $request) {
        
        $this->authorize('ADMIN');
  
        $output = ['success' => false, 'msg' => ''];
            
		$model = Model::findOrFail($request->route('id'));
		
        try {
			
			$model->getConnection()->beginTransaction();
			$model->status = 'A';
			$model->save();
            $model->getConnection()->commit();

            $output['success'] = true;
            $output['msg'] = __('Esta licença foi movida para fila e será gerada em breve');
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

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
 * Controlador Tipo de licença
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class LicensesController extends Controller {
        
    /**
     * Monta a listagem dos Tipos de licenças
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        //$this->authorize('LICENSES_LISTAR', 'PermissaoPolicy');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				->editColumn('product_id', function ($query) {
					return \App\Models\Products::findOrNew($query->product_id)->name;
				})
				->editColumn('type_id', function ($query) {
					return \App\Models\LicenseTypes::findOrNew($query->type_id)->name;
				})
				->editColumn('user_id', function ($query) {
					return \App\Models\Users::findOrNew($query->user_id)->name;
				})
				//->editColumn('length', function ($query) {
				//	return $query->length;	
				//})
				->editColumn('expiration', function ($query) {
					return app_date($query->expiration, 'Y-m-d', 'd/m/Y');
				})
				//->editColumn('hash', function ($query) {
				//	return $query->hash;
				//})
				->make(true);
        }
       
        return view('licenses.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Tipo de licença
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        //$this->authorize(($request->route('id') ? 'LICENSES_EDITAR' : 'LICENSES_CADASTRAR'), 'PermissaoPolicy');
        
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
                
				$model->type_id = 1;
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Tipo de licença foi salva com sucesso!', 'success'); 
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
    
        //$this->authorize('LICENSES_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('licenses.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Tipo de licença
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        //$this->authorize('LICENSES_EXCLUIR', 'PermissaoPolicy');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Tipo de licença foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Tipos de licenças foram excluídos com sucesso' : 'Tipo de licença foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

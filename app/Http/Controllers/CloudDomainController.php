<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CloudDomainFormRequest as FormRequest;
use App\Models\CloudDomain as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Dominios na núvem
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class CloudDomainController extends Controller {
        
    /**
     * Monta a listagem dos Domínios nas núvens
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        //$this->authorize('CLOUDDOMAIN_LISTAR', 'PermissaoPolicy');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())->make(true);
        }
       
        return view('cloud_domain.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Dominios na núvem
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        //$this->authorize(($request->route('id') ? 'CLOUDDOMAIN_EDITAR' : 'CLOUDDOMAIN_CADASTRAR'), 'PermissaoPolicy');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('cloud_domain.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('O Dominios na núvem foi alterado com sucesso!', 'success'); 
                
                return redirect(url('cloudDomain/index'));
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
    
        //$this->authorize('CLOUDDOMAIN_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize();
        
        return view('cloud_domain.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Dominios na núvem
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        //$this->authorize('CLOUDDOMAIN_EXCLUIR', 'PermissaoPolicy');
		$model = Model::getModel();
		
        $query = $model->query()->whereIn($model->getKeyName(), $request->get('id', [0]));

		//$model->authorize();
        
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {

            $model->delete();
            $model->getConnection()->commit();

            $output['success'] = true;
            $output['msg'] = 'O Dominios na núvem foi excluido com sucesso!';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

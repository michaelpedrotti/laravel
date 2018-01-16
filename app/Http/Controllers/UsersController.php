<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest as FormRequest;
use App\Models\Users as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Controlador Usuário
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class UsersController extends Controller {
        
    /**
     * Monta a listagem dos Usuários
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        //$this->authorize('USERS_LISTAR', 'PermissaoPolicy');
        
        $model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())->make(true);
        }
       
        return view('users.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Usuário
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        //$this->authorize(($request->route('id') ? 'USERS_EDITAR' : 'USERS_CADASTRAR'), 'PermissaoPolicy');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('users.form', ['model' => $model]);
        
        if($request->isMethod('post')) {
            
            
            
            $model->getConnection()->beginTransaction();
            
            try {
				
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('O Usuário foi alterado com sucesso!', 'success'); 
                
                return redirect(url('users/index'));
            } 
			catch(\Illuminate\Validation\ValidationException $e){
                
                $view->withErrors($e->validator);
				$this->setMessage('Verifique os campos', 'warning');
            }
            catch (\Exception $e) {
                
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
    
        //$this->authorize('USERS_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize();
        
        return view('users.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Usuário
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        //$this->authorize('USERS_EXCLUIR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id'));
        //$model->authorize();
        
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {

            $model->delete();
            $model->getConnection()->commit();

            $output['success'] = true;
            $output['msg'] = 'O Usuário foi excluido com sucesso!';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

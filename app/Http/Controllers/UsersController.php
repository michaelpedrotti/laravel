<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest as FormRequest;
use App\Models\Users as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

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
            return Datatables::eloquent($model->search())
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				//->editColumn('name', function ($query) {
				//	return $query->name;
				//})
				//->editColumn('email', function ($query) {
				//	return $query->email;
				//})
				//->editColumn('password', function ($query) {
				//	return $query->password;
				//})
				//->editColumn('remember_token', function ($query) {
				//	return $query->remember_token;
				//})
				->make(true);
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
		
		$view = view('users.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Usuário foi salva com sucesso!', 'success'); 
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
    
        //$this->authorize('USERS_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
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
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Usuário foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Usuários foram excluídos com sucesso' : 'Usuário foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

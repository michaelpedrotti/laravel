<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest as FormRequest;
use App\DataTables\ProfileDataTable as DataTable;
use App\Models\Profile as Model; 
use Illuminate\Http\Request;
use Response;

/**
 * Controlador Profile
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class ProfileController extends Controller {
        
    /**
     * Monta a listagem dos Perfis
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
       $this->authorize('PERFIL_LISTAR', 'PermissaoPolicy');
        
        $model = Model::getModel()->fill($request->all());

        $dataTable = app(DataTable::class);
        $dataTable->model = $model;
        
        if ($request->isXmlHttpRequest()) {
            return $dataTable->ajax();
        }
            
        return view('profile.index', [
            'model' => $model,
            'dataTable' => $dataTable->html()
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Profile
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'PERFIL_EDITAR' : 'PERFIL_CADASTRAR'), 'PermissaoPolicy');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
        
        if($request->isMethod('post')) {
            
            app(FormRequest::class);
            
            $model->getConnection()->beginTransaction();
            
            try {
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('O Profile foi alterado com sucesso!', 'success'); 
                
                return redirect(url('perfil/index'));
            } 
            catch (\Exception $e) {
                
                $model->getConnection()->rollBack();
                $this->setMessage($e->getMessage(), 'danger');                
            }            
        }
    
        return view('profile.form', [
            'model' => $model
        ]);
    }

    /**
     * Mostra o detalhe
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function show(Request $request) {
    
        $this->authorize('PERFIL_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize();
        
        $dataTable = app(\App\DataTables\PermissionDataTable::class);
        $dataTable->permissaoUserList = true;
        
        return view('profile.show', [
          'model' => $model,
          'dataTable' => $dataTable->html(),
        ]);
    }

    /**
     * Ação de destruir/excluir um Profile
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function destroy(Request $request) {
        
        $this->authorize('PERFIL_EXCLUIR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id'));

        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {

            if($model->Users->count() > 0){                
                throw new \Exception(sprintf('Existem usuário relacionados ao perfil: %s', 
                    implode(', ', $model->Users->pluck('email')->toArray())
                ));
            }
            
            $model->delete();
            $model->getConnection()->commit();

            $output['success'] = true;
            $output['msg'] = 'O Profile foi excluido com sucesso!';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
    
    /**
     * Retorna a lista de permissÃµes disponiveis
     * @return type
     */
    public function listarPermission(Request $request) {

        $this->authorize('PERFIL_VISUALIZAR', 'PermissaoPolicy');

        $model = \App\Models\Permission::getModel()->fill($request->all());
        $datatable = app(\App\DataTables\PermissionDataTable::class);

        $datatable->model = $model;
        $datatable->permissaoUserList = true;
        $datatable->perfil_id =  $request->get('perfil_id');

        return $datatable->ajax();
    }

}

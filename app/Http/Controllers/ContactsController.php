<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsFormRequest as FormRequest;
use App\Models\Contacts as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Contato
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class ContactsController extends Controller {
        
    /**
     * Monta a listagem dos Contatos
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
		    
        //$this->authorize('CONTACTS_LISTAR', 'PermissaoPolicy');
		
		if(!app_can('ADMIN') && empty($request->route('entity'))) {
		
			$this->setMessage('Tipo não foi especificado', 'warning'); 
			return redirect(url('/'));//->with('errors', []);
		}
		
		$model = Model::getModel()->fill($request->all());
		$mapper = $model->getTypes();
		
        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search($request->all()))
				->editColumn('type', function($query) use($mapper) {
					return array_get($mapper, $query->type, $query->type);
				})
				->make(true);
        }
       
        return view('contacts.index', [
            'model' => $model,
			'url' => $request->route('controller'),
			'ownerName' => $model->getOwnerName()
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Contato
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        //$this->authorize(($request->route('id') ? 'CONTACTS_EDITAR' : 'CONTACTS_CADASTRAR'), 'PermissaoPolicy');
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('contacts.form', [
            'model' => $model,
			'url' => $request->route('controller'),
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Contato foi salva com sucesso!', 'success'); 
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
    
        //$this->authorize('CONTACTS_VISUALIZAR', 'PermissaoPolicy');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('contacts.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Contato
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        //$this->authorize('CONTACTS_EXCLUIR', 'PermissaoPolicy');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Contato foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Contatos foram excluídos com sucesso' : 'Contato foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
}

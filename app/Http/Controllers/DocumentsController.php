<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentsFormRequest as FormRequest;
use App\Models\Documents as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Tipo de documento
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class DocumentsController extends Controller {
        
    /**
     * Monta a listagem dos Tipos de documento
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('DOCUMENTS_LIST');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				->editColumn('type_id', function ($query) {
					return \App\Models\DocumentTypes::findOrNew($query->type_id)->name;
				})
				//->editColumn('name', function ($query) {
				//	return $query->name;
				//})
				//->editColumn('mimetyppe', function ($query) {
				//	return $query->mimetyppe;
				//})
				->editColumn('size', function ($query) {
					return app_bytes_to_size($query->size);
				})
				//->editColumn('hash', function ($query) {
				//	return $query->hash;
				//})
				->make(true);
        }
       
        return view('documents.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Tipo de documento
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'DOCUMENTS_EDIT' : 'DOCUMENTS_ADD'));
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('documents.form', [
            'model' => $model
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Tipo de documento foi salva com sucesso!', 'success'); 
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
    
        $this->authorize('DOCUMENTS_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('documents.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Tipo de documento
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('DOCUMENTS_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Tipo de documento foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Tipos de documento foram excluídos com sucesso' : 'Tipo de documento foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
	
	/**
     * Ação de destruir/excluir um Tipo de documento
     *
     * @param Illuminate\Http\Request $request
     * @return Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	public function download(Request $request){
		
		$model = Model::find($request->route('id'));

		if(!$model) abort(404, 'Arquivo não foi encontrado');
		
		return \Response::download( storage_path('app/public/'.$model->hash), $model->downloadName(),[
			'Content-Type' => $model->mime_type,
			'Content-Disposition' => 'attachment'
		]);
	}
}

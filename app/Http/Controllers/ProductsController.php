<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsFormRequest as FormRequest;
use App\Models\Products as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Produto
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class ProductsController extends Controller {
        
    /**
     * Monta a listagem dos Produtos
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
    
        $this->authorize('PRODUCTS_LIST');
        
		$model = Model::getModel()->fill($request->all());

        if ($request->isXmlHttpRequest()) {
            return Datatables::eloquent($model->search())
				//->editColumn('id', function ($query) {
				//	return $query->id;
				//})
				//->editColumn('name', function ($query) {
				//	return $query->name;
				//})
				//->editColumn('version', function ($query) {
				//	return $query->version;
				//})
				//->editColumn('key', function ($query) {
				//	return $query->key;
				//})
				->make(true);
        }
       
        return view('products.index', [
            'model' => $model
        ]);
    }
        
    /**
     * Mostra o formulário para criar/editar um Produto
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View
     */
    public function form(Request $request) {
    
        $this->authorize(($request->route('id') ? 'PRODUCTS_EDIT' : 'PRODUCTS_ADD'));
        
        $model = Model::findOrNew($request->route('id'));
        //$model->authorize();
        $model->fill($request->all());
		
		$view = view('products.form', [
            'model' => $model,
			'attributes' => \App\Models\ProductAttributes::select(['name', 'key'])
				->where('product_id', $model->id)
					->get()
						->toArray()
        ]);
        
        if($request->isMethod('post')) {
           
            $model->getConnection()->beginTransaction();

            try {
			
				app(FormRequest::class);
                
                $model->save();
                $model->getConnection()->commit();
                
                $this->setMessage('Produto foi salva com sucesso!', 'success'); 
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
    
        $this->authorize('PRODUCTS_SHOW');
    
        $model = Model::findOrFail($request->route('id')); 
        //$model->authorize($request->route('id'));
        
        return view('products.show', [
            'model' => $model
        ]);
    }

    /**
     * Ação de destruir/excluir um Produto
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse 
     */
    public function remove(Request $request) {
        
        $this->authorize('PRODUCTS_REM');
    
		$model = Model::getModel();
        $model->getConnection()->beginTransaction();
        
        $output = ['success' => false, 'msg' => ''];
            
        try {
			
			$ids = $request->get('id');
			
			if(!is_array($ids) || count($ids) <= 0) {
				throw new Exception('Nenhum Produto foi especificado');
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
            $output['msg'] = (count($ids) > 1) ? 'Produtos foram excluídos com sucesso' : 'Produto foi excluido com sucesso';
        } 
        catch (\Exception $e) {

            $model->getConnection()->rollBack();
            $output['msg'] = $e->getMessage();            
        }  

        return Response::json($output);
    }
	
	public function download(Request $request){
		
		$model = \App\Models\ProductLicenses::select()
			->where('product_id', $request->route('id'))
				->firstOrFail();
		
		//$model->authorize();
		
		$filepath = storage_path('app/'.$model->hash);

		if(!file_exists($filepath)) {
			file_put_contents($filepath, $model->stream);
		}

        return \Response::download($filepath, $model->filename,[
			'Content-Type' => $model->mimetype,
			'Content-Disposition' => 'attachment"'
		]);		
	}
}

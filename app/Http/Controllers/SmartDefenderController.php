<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentTypesFormRequest as FormRequest;
use App\Models\DocumentTypes as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

/**
 * Controlador Tipo de documento
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class SmartDefenderController extends Controller {
	
	/**
	 * Verifica se o smartdefender ainda está valido
	 * 
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function valid(Request $request){
		
		$output = [];   
        
        try {

            if(!$request->isMethod('post')) {
                throw new \Exception('invalid_method');   
            }
            
			// Busca a licença por vcode
			$model = \App\Models\Licenses::query()
				->where('verification_code', $request->get('vcode'))
					->first();
			
			if(empty($model)) {
				throw new \Exception('invalid_credentials');
			}
			
			// Tenta casar com o nome de registro do cliente
			if($model->Customer->User->name != $request->get('username')) {
				throw new \Exception('invalid_credentials');
			}
			
			// Verifica se o IP é o mesmo que o de registro
			$bool = false;
			$addr = $request->get('addr');
			
			$model->Networks->each(function($model) use(&$bool, $addr){

				if($model->network ==  $addr){
					$bool = true;
					return false;
				}
				elseif(preg_match('/\//', $model->network) && app_cidr_range($model->network, $addr)) {
					$bool = true;
					return false;
				}
			});
			
			if($bool === false){
				throw new \Exception('unregistered_network');
			}	
			
			$output['error'] = false;
		}
        catch(\Exception $e) {
            $output['error'] = $e->getMessage();
        }
               
        return \Response::json($output);
		
	}
}
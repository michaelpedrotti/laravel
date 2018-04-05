<?php
namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdSdfndrsFormRequest as FormRequest;
use App\Models\UpdSdfndrs as Model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Guzzle\Http\StaticClient as Guzzle;

/**
 * Controlador Smart Defender
 *
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 */
class DashboardsController extends Controller {

	
    /**
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function hardware(Request $request) {
    
        $this->authorize('ADMIN');
		
		if($request->isXmlHttpRequest()) {
			
				try {

				Guzzle::mount();

				$config = config('smartdefender');

				$response = Guzzle::get('https://smartdefender.mlicloud.com/api/performance/', array(
					'headers' => array(
						'hsc-user' => array_get($config, 'mlicloud.user'),
						'hsc-pass' => array_get($config, 'mlicloud.pass')
					)
				));

				return strval($response->getBody());
			} 
			catch( \Exception $e ) {
				return \Response::json([
					'error' => true, 
					'code' => $e->getCode(), 
					'msg' => $e->getMessage()
				]);
			}			
		}
		
		
        return view('dashboards.hardware');
    }	
	
    /**
     * @param Illuminate\Http\Request $request
     * @return Illuminate\View\View | Illuminate\Http\JsonResponse
     */
    public function smartdefender(Request $request) {
    
        $this->authorize('ADMIN');
        
		if($request->isXmlHttpRequest()) {
			
				try {

				Guzzle::mount();

				$config = config('smartdefender');

				$response = Guzzle::get(array_get($config, 'mlicloud.host'), array(
					'headers' => array(
						'hsc-user' => array_get($config, 'mlicloud.user'),
						'hsc-pass' => array_get($config, 'mlicloud.pass')
					)
				));

				return strval($response->getBody());
			} 
			catch( \Exception $e ) {
				return \Response::json([
					'error' => true, 
					'code' => $e->getCode(), 
					'msg' => $e->getMessage()
				]);
			}			
		}

        return view('dashboards.smartdefender');
    }
}

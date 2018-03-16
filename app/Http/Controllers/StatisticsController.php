<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StatisticsController extends Controller {
        
    public function create(Request $request) {
    
		$output = ['status' => 'error'];
		
        try {

			$data = json_decode($request->getContent(), true);
			
			if($data === false) {
				throw new \Exception(__('Parâmetros de entrada incorretos'));
			}
			
			$filepath = storage_path(sprintf('logs/%s.log', array_get($data, 'os.hostname')));

			if(file_put_contents($filepath, print_r($data, true)) === false){
				throw new \Exception(__('Falha ao efetuar o log'));
			}

			$output['status'] = 'ok';
		} 
		catch(\Exception $e) {
			
			$output['msg'] = $e->getMessage();
		}
		
		return Response::json($output);
	}
}
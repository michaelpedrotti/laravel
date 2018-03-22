<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Licenses as Model;

class MakeLicenses extends Command {

	
	const ZEND_PATH = '/opt/Zend/ZendGuard-5_5_0/plugins/com.zend.guard.core.resources.linux.x86_5.5.0/resources/zendenc_sign';
	
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'hsc:licenses';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Cria licenças para produtos HSC que estão na fila como pendentes';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * 
	 * @return string filepath
	 */
	protected function makeTempFile($prefix = 'zend', $content = ''){
		
		$filepath = tempnam('/tmp', $prefix);
		
		if(file_put_contents($filepath, $content) === false) {
			throw new \Exception(__('Falha ao gerar o arquivo temporário'));
		}
		
		return $filepath;
	}
	
	protected function getVerCodeFromContent($content = ''){
		
		$matches = [];
		$string = '';
		
		preg_match('/Verification-Code\s+=\s+(\S+)/', $content, $matches);
		
		if(count($matches) > 1) {
			$string= array_pop($matches);
		}
		
		return $string;
	}
	
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		
		$model = Model::getModel();
		
		$collection = Model::select()
			->where('status', 'A')
				->get();

		if($collection->count() <= 0){
			$this->warn(__('Não existem licenças a serem geradas'));
			return false;
		}
		
		$model->getConnection()->beginTransaction();
		
		try {
			
			$collection->each(function($model){
				
				// App\Models\Licenses
				$attach = $model->Type->Product->License;

				$zendKeyPath = storage_path('app/'.$attach->hash);

				if(!file_exists($zendKeyPath)) {
					if(empty($attach->stream)) throw new \Exception(__('Falha ao carregar a licença'));
					file_put_contents($zendKeyPath, $attach->stream);
				}
				
				$licensePath = tempnam('/tmp', 'license');
				$templatePath = $this->makeTempFile('temp', view('layout.zend', ['model' => $model]));
				
				$command = sprintf('%s %s %s %s > /dev/null 2>&1',
					self::ZEND_PATH,
					$templatePath,
					$licensePath,
					$zendKeyPath
				);
				
				system($command);
				
				$licensePath .= '.zl';
				
				if(!file_exists($licensePath)) {
					throw new \Exception(__('Falha ao gerar a licença'));
				}
				
				$storagePath = $model->getStorageFileName();
				
				$content = file_get_contents($licensePath);
				
				Storage::put($storagePath, $content);
				
				$model->stream = $content;
				$model->hash = $storagePath;
				$model->verification_code = $this->getVerCodeFromContent($content);
				$model->status = 'G';
				$model->save();
			});
			
			$model->getConnection()->commit();
			
			$this->info(__(sprintf('%s Licença(s) foram gerada(s)', $collection->count())));
		}
		 catch(\Exception $e) {
                
			$model->getConnection()->rollBack();
			$this->warn($e->getMessage()); 
			
			return false;
        } 
	}
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Licenses as Model;

class MakeLicenses extends Command {

	
	const ZEND_COMMAND = '/opt/Zend/ZendGuard-5_5_0/plugins/com.zend.guard.core.resources.linux.x86_5.5.0/resources/zendenc_sign';
	
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
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
			
		$collection = Model::select()
			->where('status', 'A')
				->get();

		if($collection->count() > 0){
			
			$collection->each(function($model){
				
				
				print view('layout.zend', ['model' => $model]);
				//$model->status = 'G';
				//$model->save();
			});
					
			$this->info(__(sprintf('%s Licenças foram geradas', $collection->count())));
		}
		else {
			$this->warn(__('Não existem licenças a serem geradas'));
		}
	}
}

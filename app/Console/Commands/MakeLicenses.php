<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeLicenses extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:licenses';

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
			
		$collection = \App\Models\Licenses::select()
			->where('status', 'A')
				->get();

		if($collection->count() > 0){
			
			$collection->each(function($model){
				
				$model->status = 'G';
				$model->save();
			});
			
			$this->info(__(sprintf('%s Licenças foram geradas', $collection->count())));
		}
		else {
			$this->warn('Não existem licenças a serem geradas');
		}
	}
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Licenses;
use App\Models\Alerts;
use App\Models\Users;
use App\Models\AlertUsers;

class CheckLicenses extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'hsc:expiring';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Checks the licenses expiring';

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

		$model = Licenses::getModel();
		
		$collection = Licenses::select()
			->where('status', 'G')
				->get();

		if($collection->count() <= 0){
			$this->warn(__('Não existem licenças a serem geradas'));
			return false;
		}
		
		//$model->getConnection()->beginTransaction();
		
		try {

			$collection->each(function(Licenses $license){
				
				$this->warn(__(sprintf('%s: %s', $license->Product->name, $license->Custumer->User->name)));
				
				if($license->isNearToExpires()){
					
					$alert = Alerts::create([
						'title' => __('Portal HSC').' - '.__('Licenças expirando'),  
						'route' => '/licenses',
						'msg' => __('Licença de :product de :custumer vai expirar', [
							'product' => $license->Product->name,
							'custumer' => $license->Custumer->User->name,
						])
					]);
					
					
					$mailable = app(\App\Mail\LicenseExpiring::class)
						->subject(__('Portal HSC').' - '.__('Licenças expirando'))
						->with('model', $license);
					
					$collection = $license->stakeholders();
					
					if($collection->count() > 0) {
					
						foreach($collection as $user) {

							\Mail::to($user->email)->send($mailable);

							AlertUsers::create([
								'alert_id' => $alert->id, 
								'user_id' => $user->id, 
								'readed' => 'N'
							]);

							$this->info(__('  >> :email', ['email' => $user->email]));
						}	
					}
				}
				else {
					
					$this->info(__('  >> expires at :date', ['date' => $license->expiration_app]));
				}
			});
			
		}
		 catch(\Exception $e) {
                
			$model->getConnection()->rollBack();
			$this->error($e->getMessage()); 
			
			return false;
        } 
	}
}

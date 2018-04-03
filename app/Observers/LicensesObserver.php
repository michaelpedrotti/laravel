<?php

namespace App\Observers;

use App\Models\Licenses;

class LicensesObserver {

	/**
	 * Antes de salvar a model
	 */
	public function saving(Licenses $license){
			
		if(empty($license->id)) { 

			if(app_can('ADMIN')) {

				$license->status =  'G'; 
			}
			else {

				$license->status =  'S'; 
			}
		}
		else {
			unset($license->status);
		}
	}

	/**
	 * Depois de salvar a model
	 */
	public function saved(Licenses $license){

		//------------------------------------------------------------------
		// Envia alerta para os envolvidos
		//------------------------------------------------------------------
		$collection = $license->stakeholders();

		$alert = \App\Models\Alerts::create([
			'title' => __('Licenciamento'),  
			'route' => '/licenses',
			'msg' => __('Licença para o cliente :custumer com a situação :status', [
				'custumer' => $license->Customer->User->name,
				'status' => $license->statusMapperName()
			])
		]);

		$collection->each(function($model) use($alert, $license){

			\App\Models\AlertUsers::create([
				'alert_id' => $alert->id, 
				'user_id' => $model->id, 
				'readed' => 'N'
			]);

			\Mail::to($model->email)->send(app(\App\Mail\NewLicense::class)
				->subject(__('Licenciamento'))
				->with('model', $license)
			);
		});
		//------------------------------------------------------------------
		// IP/Rede
		//------------------------------------------------------------------
		\App\Models\LicenseNetworks::select()
			->where('license_id', $license->id)
				->delete();

		foreach(request('networks', []) as $network){

			\App\Models\LicenseNetworks::create([
				'license_id' => $license->id,
				'network' => $network
			]);
		}

		//------------------------------------------------------------------
		// Atributos do produto
		//------------------------------------------------------------------
		\App\Models\LicenseAttributes::select()
			->where('license_id', $license->id)
				->delete();

		foreach(request('attributes', []) as $attr_id => $bool){

			\App\Models\LicenseAttributes::create([
				'license_id' => $license->id,
				'attr_id' => $attr_id
			]);
		}
		//------------------------------------------------------------------
	}

	/**
	 * Ao carregar os dados na model
	 */
	public function retrieved(Licenses $license){

		$filepath = storage_path('app/'.$license->hash);

		if(!file_exists($filepath)){
			file_put_contents($filepath, $license->stream);
		}			
	}
}

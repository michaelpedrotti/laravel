<?php

namespace App\Listeners;

use App\Models\Distributors;
use App\Models\Resellers;
use App\Models\Clients as Customers;

/**
 * Cria o usuário de acesso antes de perssistir o distribuidor, o revendedor ou
 * o cliente. E dependêndo qual das models esta sendo persisitida já vincula o 
 * nível de hierarquia.
 * 
 * @param App\Models\Distributors|App\Models\Resellers|Customers
 * @return void
 */
class StakeholderSaving {

	public function handle($model) {

		// Se o usuário logado é um DISTRIBUITOR e esta cadastando uma Revenda
		// deve adicionar DISTRIBUTOR.id encontrado através do USERS.id na sessão
		if(($model instanceof Resellers) && app_can('DISTRIBUTOR')) {
			$model->distributor_id = Distributors::select()
				->where('user_id', \Auth::user()->id)
					->firstOrFail()
						->id;
		}
		
		// Se o usuário logado é um RESELLER e esta cadastando um Cliente
		// deve adicionar RESELLER.id encontrado através do USERS.id na sessão
		if(($model instanceof Customers) && app_can('RESELLER')) {
			$model->reseller_id = Resellers::select()
				->where('user_id', \Auth::user()->id)
					->firstOrFail()
						->id;
		}
		
		// Persiste um usuário de acesso antes de salvar este regitro
		$user = \App\Models\Users::findOrNew($model->user_id);
		$user->name = strtoupper(request('name'));
		$user->email = request('email');

		if (empty($user->id)) {
			$user->password = str_shuffle(date('Ymd'));
		}
		$user->save();
		
		$model->user_id = $user->id;
		
		
	}
}

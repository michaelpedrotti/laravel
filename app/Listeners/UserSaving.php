<?php

namespace App\Listeners;

/**
 * Utilizado no evento saving das models Distribuitor, Relleser e Clients para
 * gerar o usuário de acesso ( Users ) e depois criar o vinculo de chave estrangeira
 * antes de persistir a model na classe
 * 
 * @param Distribuitors|Rellesers|Clients
 * @return void
 */
class UserSaving {

	public function handle($model) {

		// Se o usuário logado é ADMIN então ele vai selecionar os combos de:
		// Distribuidor, Revendedor e Cliente nos cadastros
		
		// Se o usuário logado é um DISTRIBUITOR e esta cadastando uma Revenda
		// deve adicionar DISTRIBUTOR.id encontrado através do USERS.id na sessão
		if(($model instanceof \App\Models\Resellers) && app_can('DISTRIBUTOR')) {
			$model->distributor_id = \App\Models\Distributors::select()
				->where('user_id', \Auth::user()->id)
					->firstOrFail()
						->id;
		}
		
		// Se o usuário logado é um RESELLER e esta cadastando um Cliente
		// deve adicionar RESELLER.id encontrado através do USERS.id na sessão
		if(($model instanceof \App\Models\Clients) && app_can('RESELLER')) {
			$model->reseller_id = \App\Models\Resellers::select()
				->where('user_id', \Auth::user()->id)
					->firstOrFail()
						->id;
		}
		
		
		// Persiste um usuário de acesso antes de salvar este regitro
		$user = \App\Models\Users::findOrNew($model->user_id);
		$user->addHidden(['acl_id' => \App\Models\Acls::query()->where('UID', $model::UID)->first()->id]);

		$user->name = strtoupper(request('name'));
		$user->email = request('email');

		if (empty($user->id)) {
			$user->password = str_shuffle(date('Ymd'));
		}
		$user->save();
		
		$model->user_id = $user->id;
	}
}

<?php

namespace App\Observers;

use App\Models\Users;
use App\Models\Acls;
use App\Models\UserAcls;

class UsersObserver {

	/**
	 * Antes de criar um novo registro no db
	 */
	public function creating(Users $model){
			
		$data = $model->getHidden();
			
		if(!empty($data) && array_has($data, 'password_plain')) {

			$mailable = app(\App\Mail\WelcomeMail::class)
				->subject(__('Portal HSC'))
				->with('password', $data['password_plain'])
				->with('model', $model);

			\Mail::to($model->email)->send($mailable);
		}
	}
	
	/**
	 * Antes de salvar a model
	 */
	public function saving(Users $model){

		if(empty($model->id)){
			$model->password = str_shuffle(date('Ymd'));
		}
	}	

	/**
	 * Depois de salvar a model de Users adicionar um perfil ao usuário de acesso
	 * 
	 */
	public function saved(Users $model){

		if(request('acl_id') | request('is_distribuitor') | request('is_relleser') | request('is_customer')) {

			// Remove todas as permissões do usuário de acesso
			UserAcls::query()
				->where('user_id', $model->id)
					->delete();

			$id = request('acl_id');

			if(!empty($id)) {
				UserAcls::create([
					'user_id' => $model->id, 
					'acl_id' => $id
				]);
			}

			// Adicionar permissão de Distribuidor
			if(!empty(request('is_distribuitor'))) {
				UserAcls::create([
					'user_id' => $model->id, 
					'acl_id' => Acls::query()->where('UID', 'DISTRIBUTOR')->first()->id
				]);
			}

			if(!empty(request('is_relleser'))) {
				UserAcls::create([
					'user_id' => $model->id, 
					'acl_id' => Acls::query()->where('UID', 'RESELLER')->first()->id
				]);
			}

			if(!empty(request('is_customer'))) {
				UserAcls::create([
					'user_id' => $model->id, 
					'acl_id' => Acls::query()->where('UID', 'CUSTUMER')->first()->id
				]);
			}
		}
	}

	/**
	 * Antes de atualizar o registro no db
	 */
	public function updating(Users $model){

		$data = $model->getHidden();
			
		if(!empty($data) && array_has($data, 'password_plain')) {

			$mailable = app(\App\Mail\ResetPassMail::class)
				->subject(__('Troca de senha'))
				->with('password', $data['password_plain'])
				->with('model', $model);

			try {	
				\Mail::to($model->email)->send($mailable);
			} 
			catch (\Exception $e) {
				flash(__('Falha ao enviar o e-mail de boas vindas'), 'warning');
			}
		}
	}
}

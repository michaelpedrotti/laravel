<?php

namespace App\Observers;

use App\Models\Users;
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
	 * Depois de salvar a model
	 */
	public function saved(Users $model){
		
		UserAcls::query()
			->where('user_id', $model->id)
				->delete();
					
		$data = $model->getHidden();
			
		if(array_has($data, 'acl_id')) {
			
			UserAcls::create([
				'user_id' => $model->id,
				'acl_id' => $data['acl_id']
			]);
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

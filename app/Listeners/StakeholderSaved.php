<?php

namespace App\Listeners;

use App\Models\Distributors;
use App\Models\Resellers;
use App\Models\Clients as Customers;

/**
 * Executa a funcionalidade "Agragar a este cadastro" após persistir uma das models
 * verifica se as flags foram marcadas e espelha os dados.
 */
class StakeholderSaved {
	
	/**
	 * Cria ou atualiza o distribuidor
	 * 
	 * @param App\Models\Distributors|App\Models\Resellers|Customers $model
	 * @return void
	 */	
	protected function distributor($model, $bool = false){
		
		$attributes = [
			'user_id' => $model->user_id,
			'cnpj' => $model->cnpj,
			'razao_social' => $model->razao_social,
			'inscricao_estadual' => $model->inscricao_estadual
		];
		
		$relation = Distributors::select()
			->where('user_id', $model->user_id)
				->first();
		
		if(empty($relation)) {
			
			if($bool === false){ return false; }
			
			$relation = Distributors::newModelInstance($attributes);
		}

		// Previde de ficar em um loop infinito até o Deadlock
		$relation->unsetEventDispatcher();
		$relation->save($attributes);
	}
	
	/**
	 * Cria ou atualiza o revendedor
	 * 
	 * @param App\Models\Distributors|App\Models\Resellers|Customers $model
	 * @return void
	 */	
	protected function reseller($model, $bool = false){
		
		$attributes = [
			'user_id' => $model->user_id,
			'cnpj' => $model->cnpj,
			'razao_social' => $model->razao_social,
			'inscricao_estadual' => $model->inscricao_estadual
		];
		
		$relation = Resellers::select()
			->where('user_id', $model->user_id)
				->first();
		
		if(empty($relation)) {
			
			if($bool === false){ return false; }
			
			$relation = Resellers::newModelInstance($attributes);
			$relation->distributor_id = Distributors::select()->where('user_id', $model->user_id)->first()->id;
		}

		// Previde de ficar em um loop infinito até o Deadlock
		$relation->unsetEventDispatcher();
		$relation->save($attributes);
	}
	
	/**
	 * Cria ou atualiza o cliente
	 * 
	 * @param App\Models\Distributors|App\Models\Resellers|Customers $model
	 * @return void
	 */	
	protected function customer($model, $bool = false){
		
		$attributes = [
			'user_id' => $model->user_id,
			'cnpj' => $model->cnpj,
			'razao_social' => $model->razao_social,
			'inscricao_estadual' => $model->inscricao_estadual
		];
		
		$relation = Customers::select()
			->where('user_id', $model->user_id)
				->first();
		
		if(empty($relation)) {
			
			if($bool === false){ return false; }
			
			$relation = Customers::newModelInstance($attributes);
			$relation->reseller_id = Resellers::select()->where('user_id', $model->user_id)->first()->id;
		}

		// Previde de ficar em um loop infinito até o Deadlock
		$relation->unsetEventDispatcher();
		$relation->save($attributes);
	}
	
	public function handle($model) {

		if(!($model instanceof Distributors)) $this->distributor($model);
		if(!($model instanceof Resellers)) $this->reseller($model, request('is_reseller', false));
		if(!($model instanceof Clients)) $this->customer($model, request('is_customer', false));
	}
}

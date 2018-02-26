<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class NetworkFormRequest extends FormRequest {

	/**
	 * Determina se o usuário pode realizar o request
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Seta os rules para cada campo
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'network' => ['required'],
		];
	}

	/**
	 * Mensagens caso pare nos rules atribuidos
	 * @return array
	 */
	public function messages() {
		return [
			'network.required' => 'O campo "IP/Rede" não foi preenchido.',
			'network.invalid' => 'O campo "IP/Rede" é inválido',
		];
	}

	/**
	 * Validador customizado
	 *
	 * @return Illuminate\Validation\Validator
	 */
	protected function getValidatorInstance() {

		return parent::getValidatorInstance()->after(function($validator) {
			
			$messages = $this->messages();
			$data = $validator->getData();

			if(array_has($data, 'network')) {
				
				if(filter_var($data['network'], FILTER_VALIDATE_IP) || preg_match('/\d+\.\d+\.\d+\.\d+\/\d+/', $data['network'])){
					// valor correto
				}
				else {
					$validator->errors()->add('network', $messages['network.invalid']);
				}
			}
		});
	}
}

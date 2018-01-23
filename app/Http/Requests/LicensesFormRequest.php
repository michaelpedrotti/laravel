<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class LicensesFormRequest extends FormRequest {

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
			'product_id' => ['required'],
			'user_id' => ['required'],
			'expiration' => ['required', 'date_format:d/m/Y']
		];
	}

	/**
	 * Mensagens caso pare nos rules atribuidos
	 * @return array
	 */
	public function messages() {
		return [
			'product_id.required' => 'O campo "Produto" não foi preenchido.',
			'user_id.required' => 'O campo "Usuário" não foi preenchido.',
			'expiration.required' => 'O campo "Data de expiração" não foi preenchido.',
			'expiration.date_format' => 'O campo "Data de expiração" está com a formatação inválida.',
		];
	}

	/**
     * Validador customizado
     *
     * @return Illuminate\Validation\Validator
     */
    /*
    protected function getValidatorInstance() {
        
        return parent::getValidatorInstance()->after(function($validator) {

            $messages = $validator->getCustomMessages();
            $data = $validator->getData();

            $validator->errors()->add('id', $messages['id.required']);
        });
    }
    */
}
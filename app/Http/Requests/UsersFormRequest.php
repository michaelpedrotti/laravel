<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 17/01/2018
 */
class UsersFormRequest extends FormRequest
{
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
            'name' => ['required'],
            'email' => 'required|unique:users,email,'.app('request')->route('id'),
            'password' => ['required'],
			'confirm_password' => ['required'],
			'acl_id' => ['required'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
		return [
			'name.required' => 'O campo "Nome" não foi preenchido.',
			'email.required' => 'O campo "E-mail" não foi preenchido.',
			'email.unique' => 'O email já esta sendo utilizado em outro cadastro.',
			'password.required' => 'O campo "Senha" não foi preenchido.',
			'confirm_password.required' => 'O campo "Confirmar Senha" não foi preenchido.',
			'confirm_password.notequal' => 'Os campos "Senha" e "Confirmar Senha" não são iguais.',
			'acl_id.required' => 'O campo "Perfil" não foi preenchido.',
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
			
			if(empty(app('request')->route('id'))) {
			
				
				
				if(array_get($data, 'password') != array_get($data, 'confirm_password')) {

					$validator->errors()->add('password', $messages['confirm_password.notequal']);
				}
			}
        });
    }
}
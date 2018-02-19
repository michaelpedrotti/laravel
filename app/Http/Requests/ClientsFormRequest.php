<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class ClientsFormRequest extends FormRequest
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
			//'email' => ['required', 'email', 'exists:users,email'],
			'email' => ['required', 'email'],
			//'reseller_id' => ['required'],
			'cnpj' => ['required']
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [                        
                        
            'name.required' => 'O campo "Nome" não foi preenchido.',
			'email' => 'E-mail ":input" é inválido',
			'email.required' => 'O campo "E-mail" não foi preenchido.',
			'email.exists' => 'E-mail já esta sendo utilizado por outro usuário',
            'reseller_id.required' => 'O campo "Revendedor" não foi preenchido.',
			'cnpj.required' => 'O campo "CNPJ" não foi preenchido.',   
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
			
			if(app_has($data, 'email')) {
				
				$builder = \App\Models\Users::query()->where('email', $data['email']);
				
				if(!empty(request()->route('id'))) {
					$builder->where('id', '<>', \App\Models\Clients::findOrNew(request()->route('id'))->user_id);
				}
				
				if($builder->get()->count() > 0) { 
					$validator->errors()->add('email', $messages['email.exists']);
				}
			}
			
			if(!app_can('RESELLER') && !app_has($data, 'reseller_id')) {
			
				$validator->errors()->add('reseller_id', $messages['reseller_id.required']);
			}
        });
    }
}
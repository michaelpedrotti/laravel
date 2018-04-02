<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class ResellersFormRequest extends FormRequest
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
			'email' => ['required', 'email'],
            //'distributor_id' => ['required'],
            'cnpj' => ['required'],
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
            'distributor_id.required' => 'O campo "Distribuidor" não foi preenchido.',         
            'cnpj.required' => 'O campo "CNPJ" não foi preenchido.'
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
					$builder->where('id', '<>', \App\Models\Resellers::findOrNew(request()->route('id'))->user_id);
				}
				
				if($builder->get()->count() > 0) { 
					$validator->errors()->add('email', $messages['email.exists']);
				}
			}
			
			if(app_can('ADMIN')) {
				
				if(!app_has($data, 'distributor_id')) {
				
					$validator->errors()->add('distributor_id', $messages['distributor_id.required']);
				}
			}
			elseif(app_can('DISTRIBUTOR')) {
				// Ok
			}
			else {
				// Demais perfis não podem cadastrar revendas
				app_abort(401, __('Somente Administradores ou Distribuidores podem cadastrar revendas'));
			}
        });
    }
}
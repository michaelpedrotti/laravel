<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 14/02/2018
 */
class DistributorsFormRequest extends FormRequest
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
			'email' => ['required'],
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
			'email.required' => 'O campo "E-mail" não foi preenchido.',
			'email.exists' => 'E-mail já esta sendo utilizado por outro usuário',
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
					$builder->where('id', '<>', \App\Models\Distributors::findOrNew(request()->route('id'))->user_id);
				}
				
				if($builder->get()->count() > 0) { 
					$validator->errors()->add('email', $messages['email.exists']);
				}
			}
        });
    }
}
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class LicenseTypesFormRequest extends FormRequest
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
			'product_id' => ['required'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                        
                        
            'name.required' => 'O campo "Nome" não foi preenchido.',            
            'product_id.required' => 'O campo "Produto" não foi preenchido.',           
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
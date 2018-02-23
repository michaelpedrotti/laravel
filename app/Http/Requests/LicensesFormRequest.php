<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 15/02/2018
 */
class LicensesFormRequest extends FormRequest
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
            'product_id' => ['required'],
            'type_id' => ['required'],
            'customer_id' => ['required'],
            'expiration_app' => ['required','date_format:d/m/Y'],
			'expiration_upd' => ['required','date_format:d/m/Y'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                        
            'product_id.required' => 'O campo "Produto" não foi preenchido.',            
            'type_id.required' => 'O campo "Tipo de licença" não foi preenchido.',            
            'customer_id.required' => 'O campo "Cliente" não foi preenchido.',                      
            'expiration_app.required' => 'O campo "Data de expiração" não foi preenchido.',            
            'expiration_app.date_format' => 'O campo "Data de expiração" está com a formatação inválida.',            
            'expiration_upd.required' => 'O campo "Data de expiração" não foi preenchido.',            
            'expiration_upd.date_format' => 'O campo "Data de expiração" está com a formatação inválida.',         
                        
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
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 17/01/2018
 */
class ExtensionRuleFormRequest extends FormRequest
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
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                        
                        
                        
                        
                        
                        
                        
            'timestamp.date_format' => 'O campo "timestamp" está com a formatação inválida.',            
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
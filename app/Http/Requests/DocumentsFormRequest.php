<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 18/01/2018
 */
class DocumentsFormRequest extends FormRequest
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
            'type_id' => ['required'],
            'name' => ['required'],
            'mimetyppe' => ['required'],
            'size' => ['required'],
            'hash' => ['required'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                        
                        
            'type_id.required' => 'O campo "Tipo" não foi preenchido.',            
                        
            'name.required' => 'O campo "Nome" não foi preenchido.',            
                        
            'mimetyppe.required' => 'O campo "Mime-Type" não foi preenchido.',            
                        
            'size.required' => 'O campo "Tamanho" não foi preenchido.',            
                        
            'hash.required' => 'O campo "Storage" não foi preenchido.',            
                        
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
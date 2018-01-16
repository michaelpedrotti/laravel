<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 15/01/2018
 */
class CloudDomainFormRequest extends FormRequest
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
            'point' => ['required'],
            'domain' => ['required'],
            'server' => ['required'],
            'port' => ['required'],
            'userId' => ['required'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                        
                        
            'point.required' => 'O campo "Ponto de Acesso" não foi preenchido.',            
                        
            'domain.required' => 'O campo "Domínio" não foi preenchido.',            
                        
            'server.required' => 'O campo "Servidor" não foi preenchido.',            
                        
            'port.required' => 'O campo "Porta" não foi preenchido.',            
                        
                        
                        
            'userId.required' => 'O campo "Usuário" não foi preenchido.',            
                        
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
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Join Tecnologia & Design <suporte@jointecnologia.com.br>
 * @version 03/05/2017
 */
class UpdatePasswordFormRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'password_confirmation' => 'required|same:password',
            'password_current' => 'required',
            'password' => 'required|min:8|max:255',
        ];
    }

    public function messages() {
        return [
            'password_confirmation.same' => 'O campo "Confirmar Nova Senha" esta diferente do "Nova Senha"',
            'password_confirmation.required' => 'O campo "Confirmar Nova Senha" não foi preenchido.',
            'password_current.required' => 'O campo "Senha Atual" não foi preenchido.',
            'password_current.wrong' => 'O campo "Senha Atual" esta incorreto.',
            'password.required' => 'O campo "Nova Senha" não foi preenchido.',
            'password.min' => 'O campo "Nova Senha" deve conter no mínimo 8 caracteres.',
            'password.max' => 'O campo "Nova Senha" passou o limite de caracteres.',
            'password.caracter_maiusculo' => 'O campo "Nova Senha" deve conter no mínimo 1 caracter maiúsculo.',
        ];
    }
    
    /**
     * Pega a instancia de validação e adiciona o validador
     * @return type
     */
    protected function getValidatorInstance() {
        
        return parent::getValidatorInstance()->after(function($validator) {

            $messages = $this->messages();
            $data = $validator->getData();

            if(array_key_exists('password_current', $data) && !empty($data['password_current'])) {
                
                $model = \App\User::findOrFail(\Auth::user()->id);
                
                if($model->password != md5($data['password_current'])) {
                    
                    $validator->errors()->add('password_current', $messages['password_current.wrong']);
                }
            }
        });
    }
}
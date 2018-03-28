<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Controle de formulário do modelo especificado
 * @author Michael Pedrotti <michael.pedrotti@hscbrasil.com.br>
 * @version 27/03/2018
 */
class UpdSdfndrsFormRequest extends FormRequest
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
            'type' => ['required'],
            'value' => ['required'],
            'status' => ['required'],
        ];
    }
    
    /**
     * Mensagens caso pare nos rules atribuidos
     * @return array
     */
    public function messages() {
        return [
                                   
            'type.required' => 'O campo "Tipo" não foi preenchido.',            
            'value.required' => 'O campo "Valor" não foi preenchido.',
            'status.required' => 'O campo "Situação" não foi preenchido.',                
        ];
    }
    
    
    /**
     * Validador customizado
     *
     * @return Illuminate\Validation\Validator
     */
    protected function getValidatorInstance() {
        
        return parent::getValidatorInstance()->after(function(\Illuminate\Validation\Validator $validator) {

            $data = $validator->getData();
			$messageBag = $validator->errors();
			
			if(array_has($data, 'type') && array_has($data, 'value')) {
				
				switch($data['type']) {
					case 'URL':
						if(!filter_var($data['value'], FILTER_VALIDATE_URL)) {
							$messageBag->add('value', __('Valor da URL esta incorreto'));
						}
						break;
					
					case 'DOM':
						if(!filter_var($data['value'], FILTER_VALIDATE_DOMAIN)) {
							$messageBag->add('value', __('Valor do domínio esta incorreto'));
						}
						break;
					
//					case 'REGX':
//						if(!filter_var($data['value'], FILTER_VALIDATE_REGEXP)) {
//							$messageBag->add('value', __('Valor da regex esta incorreto'));
//						}
//						break;
					
					case 'FILE':
						if(strlen($data['value']) > 40){
							$messageBag->add('value', __('Valor do SHA1 esta incorreto'));
						}
						break;
					
					case 'IP':
						if(!filter_var($data['value'], FILTER_VALIDATE_IP)) {
							$messageBag->add('value', __('Valor do IP esta incorreto'));
						}
						break;
					
					case 'NET':
						if(!preg_match('/^((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])(\/([1-9]|1[0-9]|2[0-9]|3[0-2]))*$/', $data['value'])){
							$messageBag->add('value', __('Valor da rede esta incorreto'));
						}
						break;
				}
			}   
        });
    }
}
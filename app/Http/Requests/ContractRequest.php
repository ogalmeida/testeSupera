<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize(){
    return auth()->check();
  }

  protected $messages = [
    'required' => 'Complete todos os campos',
    'digits' => 'O número de dígitos deve ser 14',
    'email' => 'Digite um email válido',
  ];

  public function messages () {
    return $this->messages;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules(){
    return [
      'cnpj' => 'required|digits:14',
      'corporate_name' => 'required|string',
      'fantasy_name' => 'required|string',
      'email' => 'required',
    ];
  }


}

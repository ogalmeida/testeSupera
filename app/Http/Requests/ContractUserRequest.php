<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractUserRequest extends FormRequest{
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
    'digits' => 'O número de dígitos deve ser 11',
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
      'cpf' => 'required|digits:11',
      'name' => 'required|string',
    ];
  }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnityRequest extends FormRequest{
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
    'size' => 'Digite a sigla de um estado. Ex.: GO',
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
      'integration' => 'required|string',
      'state' => 'required|string|size:2',
      'city' => 'required|string',
      'email' => 'required',
    ];
  }
}

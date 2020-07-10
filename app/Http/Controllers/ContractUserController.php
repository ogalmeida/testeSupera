<?php

namespace App\Http\Controllers;

use App\ContractUser;
use App\Http\Requests\ContractUserRequest;

class ContractUserController extends Controller{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(){
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(){
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \App\Http\Requests\ContractUserRequest  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ContractUserRequest $request){
    if(!$this->cpfVerification($request->cpf)){
      return back()->with(['error' => 'O CPF informado é inválido ou já existe um usuário com este CPF!']);
    }

    $status = ContractUser::create($request->except('_token'));

    if($status){
      return back()->withStatus(__('Os dados foram salvos com sucesso!'));
    } else {
      return back()->withStatus(__('Houve um problema ao salvar os dados!'));
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\ContractUser  $contractUser
  * @return \Illuminate\Http\Response
  */
  public function show(ContractUser $contractUser){
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\ContractUser  $contractUser
  * @return \Illuminate\Http\Response
  */
  public function edit(ContractUser $contractUser){
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \App\Http\Requests\ContractUserRequest  $request
  * @param  \App\ContractUser  $contractUser
  * @return \Illuminate\Http\Response
  */
  public function update(ContractUserRequest $request, ContractUser $contractUser){
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\ContractUser  $contractUser
  * @return \Illuminate\Http\Response
  */
  public function destroy(ContractUser $contractUser){
    $id = $contractUser->contract_id;
    $contractUser->delete();
    return back()->withStatus(__('O usuário foi excluído com sucesso!'));
  }

  private function cpfVerification($cpf){
    return !ContractUser::where('cpf', $cpf)->first() && $this->validateCpf($cpf);
  }

  private function validateCpf($cpf){
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
  }
}

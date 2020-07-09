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
    dd('to aqui');

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
}

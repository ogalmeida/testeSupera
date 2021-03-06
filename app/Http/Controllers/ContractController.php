<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Requests\ContractRequest;
use App\Http\Controllers\utils\Image;

class ContractController extends Controller{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(){
    return view('contracts.index')->with([
      'contracts' => Contract::orderBy('id', 'desc')->paginate(8, ['*'], 'contracts'),
      'page' => 'list',
      'title' => 'Listagem de contratos',
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(){
    return view('contracts.index')->with([
      'page' => 'create',
      'title' => 'Adicionar contrato'
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ContractRequest $request){

    if($this->validateEmail($request->email)){
      return back()->with(['error' => 'Já existe uma unidade com esse endereço de Email!']);
    }

    if($this->validateCnpj($request->cnpj)){
      return back()->with(['error' => 'Já existe uma unidade com esse CNPJ!']);
    }

    if($request->hasFile('logo')){
      $name = Image::uploadImage($request->file('logo'));
    }

    $status = Contract::create([
      'cnpj' => $request->cnpj,
      'corporate_name' => $request->corporate_name,
      'fantasy_name' => $request->fantasy_name,
      'email' => $request->email,
      'status' => ($request->status === 'true') ? 1 : 0,
      'logo' => isset($name) ? $name : 'no-logo.png',
    ]);

    if($status){
      return redirect()->route('contract.show', ['contract' => $status->id])->withStatus(__('Os dados foram salvos com sucesso!'));
    } else {
      return redirect()->route('contract.create')->withStatus(__('Houve um problema ao salvar os dados!'));
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function show(Contract $contract){
    return view('contracts.index')->with([
      'contract' => $contract,
      'unities' => $contract->unities()->orderBy('id', 'desc')->paginate(8, ['*'], 'unities'),
      'contractUsers' => $contract->contractUsers()->orderBy('id', 'desc')->paginate(8, ['*'], 'contractUsers'),
      'page' => 'show',
      'title' => 'Editar contrato',
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function edit(Contract $contract){
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function update(ContractRequest $request, Contract $contract){

    $sameEmail = $this->validateEmail($request->email);

    if($sameEmail && ($sameEmail->id !== $contract->id)){
      return back()->with(['error' => 'Já existe uma unidade com esse endereço de Email!']);
    }

    $sameCnpj = $this->validateCnpj($request->cnpj);

    if($sameCnpj && ($sameCnpj->id !== $contract->id)){
      return back()->with(['error' => 'Já existe uma unidade com esse CNPJ!']);
    }

    if($request->hasFile('logo')){
      $name = Image::uploadImage($request->file('logo'));
      $contract->fill([
        'logo' => $name
      ]);
    }
    $contract->fill([
      'cnpj' => $request->cnpj,
      'corporate_name' => $request->corporate_name,
      'fantasy_name' => $request->fantasy_name,
      'email' => $request->email,
      'status' => ($request->status === 'true') ? 1 : 0,
    ]);

    $contract->save();

    return back()->withStatus(__('Os dados foram salvos com sucesso!'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function destroy(Contract $contract){
    unlink(public_path('img/'.$contract->logo));
    $contract->unities()->delete();
    $contract->contractUsers()->delete();
    $contract->delete();
    return back()->withStatus(__('O contrato foi excluído com sucesso!'));
  }

  private function validateEmail($email){
    return Contract::where('email', $email)->first();
  }

  private function validateCnpj($cnpj){
    return Contract::where('cnpj', $cnpj)->first();
  }
}

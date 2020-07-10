<?php

namespace App\Http\Controllers;

use App\Unity;
use App\Http\Requests\UnityRequest;
use App\Http\Controllers\utils\Image;

class UnityController extends Controller{
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
  * @param  \App\Http\Requests\UnityRequests\UnityRequest  $request
  * @return \Illuminate\Http\Response
  */
  public function store(UnityRequest $request){

    if($this->validateIntegration($request->integration)){
      return back()->with(['error' => 'Já existe uma unidade com essa Integração!']);
    }

    if($this->validateEmail($request->email)){
      return back()->with(['error' => 'Já existe uma unidade com esse endereço de Email!']);
    }

    if($request->hasFile('logo')){
      $name = Image::uploadImage($request->file('logo'));
    }

    $status = Unity::create([
      'contract_id' => $request->contract_id,
      'integration' => $request->integration,
      'state' => $request->state,
      'city' => $request->city,
      'email' => $request->email,
      'type' => $request->type,
      'status' => ($request->status === 'true') ? 1 : 0,
      'logo' => isset($name) ? $name : 'no-logo.png',
    ]);

    if($status){
      return back()->withStatus(__('Os dados foram salvos com sucesso!'));
    } else {
      return back()->withStatus(__('Houve um problema ao salvar os dados!'));
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Unity  $unity
  * @return \Illuminate\Http\Response
  */
  public function show(Unity $unity){
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Unity  $unity
  * @return \Illuminate\Http\Response
  */
  public function edit(Unity $unity){
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \App\Http\Requests\UnityRequest  $request
  * @param  \App\Unity  $unity
  * @return \Illuminate\Http\Response
  */
  public function update(UnityRequest $request, Unity $unity){

    $sameIntegration = $this->validateIntegration($request->integration);

    if($sameIntegration && ($sameIntegration->id !== $unity->id)){
      return back()->with(['error' => 'Já existe uma unidade com essa Integração!']);
    }

    $sameEmail = $this->validateEmail($request->email);

    if($sameEmail && ($sameEmail->id !== $unity->id)){
      return back()->with(['error' => 'Já existe uma unidade com esse endereço de Email!']);
    }

    if($request->hasFile('logo')){
      $name = Image::uploadImage($request->file('logo'));
      $unity->fill([
        'logo' => $name
      ]);
    }
    $unity->fill([
      'integration' => $request->integration,
      'state' => $request->state,
      'city' => $request->city,
      'email' => $request->email,
      'type' => $request->type,
      'status' => ($request->status === 'true') ? 1 : 0,
    ]);

    $unity->save();

    return back()->withStatus(__('Os dados foram salvos com sucesso!'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Unity  $unity
  * @return \Illuminate\Http\Response
  */
  public function destroy(Unity $unity){
    unlink(public_path('img/'.$unity->logo));
    $unity->attestations()->delete();
    $unity->delete();
    return back()->withStatus(__('A unidade foi excluída com sucesso!'));
  }

  private function validateIntegration($integration){
    return Unity::where('integration', $integration)->first();
  }

  private function validateEmail($email){
    return Unity::where('email', $email)->first();
  }
}

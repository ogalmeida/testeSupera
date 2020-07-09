<?php

namespace App\Http\Controllers;

use App\Attestation;
use Illuminate\Http\Request;

class AttestationController extends Controller{
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
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request){
    $status = Attestation::create([
      'unity_id' => $request->unity_id,
      'patient' => $request->patient,
      'companion' => $request->companion,
      'death' => $request->death,
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
  * @param  \App\Attestation  $attestation
  * @return \Illuminate\Http\Response
  */
  public function show(Attestation $attestation){
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Attestation  $attestation
  * @return \Illuminate\Http\Response
  */
  public function edit(Attestation $attestation){
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Attestation  $attestation
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Attestation $attestation){
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Attestation  $attestation
  * @return \Illuminate\Http\Response
  */
  public function destroy(Attestation $attestation){
    $attestation->delete();
    return back()->withStatus(__('O atestado foi excluído com sucesso!'));
  }
}

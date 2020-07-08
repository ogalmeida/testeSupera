<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(){
    return view('contracts.index')->with([
      'contracts' => Contract::orderBy('id', 'desc')->get(),
      'page' => 'list',
      'title' => 'Listagem',
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
      'title' => 'Adicionar'
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function show(Contract $contract)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function edit(Contract $contract)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Contract $contract)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Contract  $contract
  * @return \Illuminate\Http\Response
  */
  public function destroy(Contract $contract)
  {
    //
  }
}

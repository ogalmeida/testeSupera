<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unity;
use App\Contract;

class ModalController extends Controller{
  public function getData($contract, $operation, $config, $id=null){

    $contract = Contract::find($contract);

    switch($operation){
      case 'create':
        if($config === 'attestation'){
          return view('contracts.partial.forms.attestation-create')->with([
            'unity' => Unity::find($id),
            'contract' => $contract
          ]);
        }
        return view('contracts.partial.forms.'.$config.'-'.$operation)->with([
          'contract' => $contract
        ]);
      case 'view':
        return view('contracts.partial.tables.'.$config)->with([
          'attestations' => Unity::find($id)->attestations,
          'contract' => $contract
        ]);
      case 'update':
        return view('contracts.partial.forms.'.$config.'-'.$operation)->with([
          'unity' => Unity::find($id),
          'contract' => $contract
        ]);
      case 'destroy':
        return view('contracts.partial.confirmations.'.$config)->with([
          'id' => $id
        ]);
    }
  }
}

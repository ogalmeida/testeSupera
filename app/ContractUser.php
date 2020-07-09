<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractUser extends Model{
  protected $fillable = [
    'contract_id',
    'cpf',
    'name',
  ];

  public function contract() {
    return $this->belongsTo('App\Contract');
  }

}

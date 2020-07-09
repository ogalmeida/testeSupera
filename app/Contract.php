<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model{
  protected $fillable = [
    'cnpj',
    'corporate_name',
    'fantasy_name',
    'email',
    'status',
    'logo',
  ];

  public function unities() {
    return $this->hasMany('App\Unity');
  }

  public function contractUsers() {
    return $this->hasMany('App\ContractUser');
  }
}

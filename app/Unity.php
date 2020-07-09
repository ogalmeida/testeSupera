<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model{
  protected $table = 'unities';

  protected $fillable = [
    'contract_id',
    'integration',
    'email',
    'city',
    'state',
    'logo',
    'type',
    'status',
  ];

  public function contract() {
    return $this->belongsTo('App\Contract');
  }

  public function attestations() {
    return $this->hasMany('App\Attestation');
  }
}

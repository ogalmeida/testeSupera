<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model{
  protected $fillable = [
    'unity_id',
    'patient',
    'companion',
    'death'
  ];

  public function unity() {
    return $this->belongsTo('App\Unity');
  }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestations extends Migration{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up(){
    Schema::create('attestations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('unity_id');
      $table->string('patient');
      $table->string('companion');
      $table->string('death');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('attestations');
  }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractUsers extends Migration{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up(){
    Schema::create('contract_users', function (Blueprint $table) {
      $table->id();
      $table->foreignId('contract_id');
      $table->string('cpf');
      $table->string('name');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('contract_users');
  }
}

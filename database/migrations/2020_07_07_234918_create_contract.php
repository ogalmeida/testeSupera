<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContract extends Migration{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up(){
    Schema::create('contracts', function (Blueprint $table) {
      $table->id();
      $table->string('cnpj');
      $table->string('corporate_name');
      $table->string('fantasy_name');
      $table->string('email');
      $table->string('logo');
      $table->boolean('status');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('contracts');
  }
}
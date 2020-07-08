<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnities extends Migration{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up(){
    Schema::create('unities', function (Blueprint $table) {
      $table->id();
      $table->foreignId('contract_id');
      $table->unsignedInteger('integration');
      $table->string('email');
      $table->string('city');
      $table->string('logo');
      $table->enum('type', ['Json', 'Webview', 'XML', 'HL7']);
      $table->boolena('status');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('unities');
  }
}

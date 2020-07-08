<?php

use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run(){

    $contracts = [
      [
        'cnpj' => '12345678910121',
        'corporate_name' => 'Empresa 1',
        'fantasy_name' => 'Empresa teste para supera',
        'email' => 'teste@empresa1.com.br',
        'logo' => 'no-logo.png',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'cnpj' => '32165498745679',
        'corporate_name' => 'Empresa 2',
        'fantasy_name' => 'Empresa 2 teste para supera',
        'email' => 'teste@empresa2.com.br',
        'logo' => 'no-logo.png',
        'status' => false,
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'cnpj' => '65498732148967',
        'corporate_name' => 'Empresa 3',
        'fantasy_name' => 'Empresa 3 teste para supera',
        'email' => 'teste@empresa3.com.br',
        'logo' => 'no-logo.png',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];

    DB::table('contracts')->insert($contracts);
  }
}

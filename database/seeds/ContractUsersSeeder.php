<?php

use Illuminate\Database\Seeder;

class ContractUsersSeeder extends Seeder{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run(){
    $contractUsers = [
      [
        'contract_id' => '1',
        'name' => 'Usuário 1',
        'cpf' => '12345678909',
      ],
      [
        'contract_id' => '2',
        'name' => 'Usuário 2',
        'cpf' => '98765432165',
      ],
      [
        'contract_id' => '2',
        'name' => 'Usuário 3',
        'cpf' => '95132467895',
      ]
    ];

    DB::table('contract_users')->insert($contractUsers);
  }
}

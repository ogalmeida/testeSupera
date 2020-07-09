<?php

use Illuminate\Database\Seeder;

class UnitySeeder extends Seeder{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run(){
    $unities = [
      [
        'contract_id' => '1',
        'integration' => 'integracao 1 tal',
        'email' => 'unidade1@supera.com',
        'city' => 'Goiânia',
        'state' => 'GO',
        'status' => true,
        'logo' => 'no-logo.png',
        'type' => 'Json',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'contract_id' => '1',
        'integration' => 'integracao 2 tal',
        'email' => 'unidade2@supera.com',
        'city' => 'Catalão',
        'state' => 'GO',
        'status' => false,
        'logo' => 'no-logo.png',
        'type' => 'XML',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'contract_id' => '2',
        'integration' => 'integracao 3 tal',
        'email' => 'unidade3@supera.com',
        'city' => 'Goiânia',
        'state' => 'GO',
        'status' => true,
        'logo' => 'no-logo.png',
        'type' => 'HL7',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];

    DB::table('unities')->insert($unities);
  }
}

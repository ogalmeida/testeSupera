<?php

use Illuminate\Database\Seeder;

class AttestationSeeder extends Seeder{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run(){
    $attestations = [
      [
        'unity_id' => '1',
        'patient' => 'paciente 1',
        'companion' => 'paciente 2',
        'death' => 'paciente 3',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'unity_id' => '2',
        'patient' => 'paciente 2',
        'companion' => 'paciente 3',
        'death' => 'paciente 1',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'unity_id' => '2',
        'patient' => 'paciente 3',
        'companion' => 'paciente 1',
        'death' => 'paciente 2',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];

    DB::table('attestations')->insert($attestations);
  }
}

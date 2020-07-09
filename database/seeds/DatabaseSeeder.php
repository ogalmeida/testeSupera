<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call([UsersTableSeeder::class]);
    $this->call([ContractSeeder::class]);
    $this->call([UnitySeeder::class]);
    $this->call([AttestationSeeder::class]);
    $this->call([ContractUsersSeeder::class]);
  }
}

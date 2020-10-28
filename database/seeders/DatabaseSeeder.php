<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
        'cpf'           => '12345678912',
        'nome'          => 'Gabriel',
        'phone'         => '96101169',
        'birth'         => '1999-08-02',
        'gender'        => 'M',
        'email'         => 'gabriel@sistema.com.br',
        'password'      => bcrypt('123456'),
        ]);
    }
};
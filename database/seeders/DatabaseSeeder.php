<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Instituition;

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
        'cpf'           => '07313070977',
        'name'          => 'Gabriel Machado',
        'phone'         => '41996401985',
        'birth'         => '1999-08-02',
        'gender'        => 'M',
        'email'         => 'gabriel@sistema.com.br',
        'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',

        ]);
    }
};
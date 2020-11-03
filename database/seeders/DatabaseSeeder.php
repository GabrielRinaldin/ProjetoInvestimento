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
        'cpf'           => '12345678913',
        'nome'          => 'Gabriel',
        'phone'         => '96101169',
        'birth'         => '1999-08-02',
        'gender'        => 'M',
        'email'         => 'gabrielrinaldin@sistema.com.br',
        'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',

        ]);
        Instituition::create([
            'name' => 'HQS' ,
            ]);
    }
};
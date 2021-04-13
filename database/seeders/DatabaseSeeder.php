<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Instituition;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrayUserType = ['client', 'admin'];

        for ($i = 0; $i < 50; $i++) {

            User::create([
                'cpf'           => mt_rand(00000000000, 99999999999),
                'name'          => $faker->name,
                'phone'         => mt_rand(00000000000, 99999999999),
                'birth'         => $faker->date,
                'email'         => $faker->email,
                'user_type'     => $arrayUserType[rand(0, 1)],
                'password'      => Hash::make('123456789'),

            ]);
        }
    }
};

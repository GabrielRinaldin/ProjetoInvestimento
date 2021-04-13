<?php

namespace Database\Factories;

use App\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $arrayUserType = ['client', 'admin'];

        return [
            'cpf'           => mt_rand(00000000000, 99999999999),
            'name'          => $faker->name,
            'phone'         => mt_rand(00000000000, 99999999999),
            'birth'         => $faker->date,
            'email'         => $faker->email,
            'user_type'     => $arrayUserType[rand(0,1)],
            'password'      => Hash::make('123456789'),
        ];
    }
}

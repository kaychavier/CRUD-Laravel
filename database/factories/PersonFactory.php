<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'img'=>fake()->url(),
            'type'=>'student',
            'cpf'=>'99999999999',
            'email'=>fake()->email(),
            'password'=>fake()->password()
        ];
    }
}

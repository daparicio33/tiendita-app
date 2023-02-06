<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre'=>$this->faker->name(),
            'dniRuc'=>$this->faker->unique()->numberBetween(11111111,99999999),
            'direccion'=>$this->faker->address(),
            'telefono'=>$this->faker->phoneNumber(),
        ];
    }
}

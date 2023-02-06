<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->company(),
            'ruc'=>$this->faker->unique()->numberBetween(11111111111,99999999999),
            'direccion'=>$this->faker->address(),
            'telefono'=>$this->faker->numberBetween(900000000,999999999)
        ];
    }
}

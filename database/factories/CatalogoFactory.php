<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categorias = Categoria::pluck('id')->toArray();
        return [
            //
            'nombre'=>implode(' ',$this->faker->words($nb = 3)),
            'precio'=>$this->faker->randomFloat(2,10,100),
            'categoria_id'=>$this->faker->randomElement($categorias),
        ];
    }
}

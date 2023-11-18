<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vendedor>
 */
class VendedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_usuario' => $this->faker->unique()->userName,
            'nombre_marca' => $this->faker->unique()->company,
            'ventas' => $this->faker->numberBetween(0, 100),
            'calificacion' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}

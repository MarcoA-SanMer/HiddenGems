<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->words(3, true),
            'Precio' => $this->faker->randomFloat(2, 1, 100),
            'Descripción' => $this->faker->paragraph,
            'Categoria' => $this->faker->word,
        ];
    }
}

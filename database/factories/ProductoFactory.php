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
        // Generar una imagen aleatoria
        $imagePath = 'public/storage/imagenes'; // Asegúrate de que esta ruta sea la correcta
        $image = $this->faker->image($imagePath); // Guarda la imagen en 'public/storage/images'

        return [
            'Nombre' => $this->faker->words(2, true),
            'Precio' => $this->faker->randomFloat(2, 1, 100),
            'Descripción' => $this->faker->paragraph,
            'Categoria' => $this->faker->randomElement(['casual', 'formal','deportivo']),
            'imagen_nombre' => basename($image), // Guarda el nombre de la imagen en la base de datos
            'imagen_ruta' => str_replace('public', '/storage', $imagePath) . '/' . basename($image), // Guarda la ruta de la imagen en la base de datos
        ];
    }
}
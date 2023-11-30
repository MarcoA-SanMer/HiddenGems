<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            if ($user->user_type == 'vendedor') {
                $vendedor = $user->vendedor()->save(\App\Models\vendedor::factory()->make());
                $products = \App\Models\Producto::factory(3)->make();
                foreach ($products as $product) {
                    $vendedor->productos()->save($product);
                }
            } elseif ($user->user_type == 'comprador') {
                $user->comprador()->save(\App\Models\Comprador::factory()->make());
            }
        });

        $vendedores = \App\Models\vendedor::all();
        $productos = \App\Models\Producto::all();
        
        foreach ($productos as $producto) {
            // Selecciona un vendedor aleatorio
            $vendedor = $vendedores->random();
        
            // Verifica si el producto ya está relacionado con el vendedor
            if (!$producto->vendedores->contains($vendedor->id)) {
                // Si no está relacionado, entonces relaciona el producto con el vendedor
                $producto->vendedores()->attach($vendedor->id);
            }
        }

        $compradores = \App\Models\Comprador::all();

        foreach ($compradores as $comprador) {
            $compras = \App\Models\Compra::factory(2)->make();
            foreach ($compras as $compra) {
                $producto = \App\Models\Producto::all()->random();
                $compra->producto_id = $producto->id;
                $comprador->compras()->save($compra);
            }
        }
    }
}

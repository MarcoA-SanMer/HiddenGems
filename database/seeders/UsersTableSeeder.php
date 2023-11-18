<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
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
    }
}

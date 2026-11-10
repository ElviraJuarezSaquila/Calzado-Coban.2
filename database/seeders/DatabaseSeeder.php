<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Cliente;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Administrador con clave 12345
        User::create([
            'name' => 'Haniel del Valle (Admin)',
            'email' => 'admin@calzadocoban.com',
            'rol' => 'admin',
            'password' => Hash::make('12345'),
        ]);

        // Vendedor con clave 12345
        User::create([
            'name' => 'Elvira Juarez (Vendedora)',
            'email' => 'ventas@calzadocoban.com',
            'rol' => 'vendedor',
            'password' => Hash::make('12345'),
        ]);

        // Marcas iniciales
        $coban = Marca::create(['nombre' => 'Calzado Cobán Original']);
        $rhino = Marca::create(['nombre' => 'Botas Rhino']);
        $cat = Marca::create(['nombre' => 'Caterpillar']);
        $nike = Marca::create(['nombre' => 'Nike']);

        // Inventario inicial
        Producto::create([
            'marca_id' => $coban->id,
            'nombre' => 'Bota Industrial Punta de Acero',
            'talla' => '41',
            'precio' => 650.00,
            'stock' => 25,
        ]);

        Producto::create([
            'marca_id' => $rhino->id,
            'nombre' => 'Botín Todo Terreno Cuero Café',
            'talla' => '40',
            'precio' => 525.00,
            'stock' => 15,
        ]);

        Producto::create([
            'marca_id' => $cat->id,
            'nombre' => 'Bota Casual Colorado Miel',
            'talla' => '42',
            'precio' => 890.00,
            'stock' => 10,
        ]);

        Producto::create([
            'marca_id' => $nike->id,
            'nombre' => 'Tenis Deportivo Air Zoom',
            'talla' => '39',
            'precio' => 750.00,
            'stock' => 20,
        ]);

        // Clientes iniciales
        Cliente::create([
            'nit' => '984835-10',
            'nombre' => 'Alfredo Haniel Delvalle Escobar',
        ]);

        Cliente::create([
            'nit' => '3036086-9',
            'nombre' => 'Maria Izabel Perez Enriquez',
        ]);
    }
}
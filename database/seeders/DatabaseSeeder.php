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
        // 1. Usuarios del sistema con Roles (Fase 2)
        User::create([
            'name' => 'Haniel del Valle (Admin)',
            'email' => 'admin@calzadocoban.com',
            'rol' => 'admin',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Elvira Juarez (Vendedora)',
            'email' => 'ventas@calzadocoban.com',
            'rol' => 'vendedor',
            'password' => Hash::make('12345'),
        ]);

        // 2. 15 Marcas Registradas
        $marcasNombres = [
            'Calzado Cobán Original', 'Botas Rhino', 'Caterpillar', 'Nike', 'Adidas',
            'Bosi', 'Hush Puppies', 'Vans', 'Converse', 'Timberland',
            'Puma', 'Reebok', 'Skechers', 'Crocs', 'Levis'
        ];

        $marcasCreadas = [];
        foreach ($marcasNombres as $nombreMarca) {
            $marcasCreadas[] = Marca::create(['nombre' => $nombreMarca]);
        }

        // 3. Inventario Inicial de Calzado por Marcas
        Producto::create([
            'marca_id' => $marcasCreadas[0]->id,
            'nombre' => 'Bota Industrial Punta de Acero',
            'talla' => '41',
            'precio' => 650.00,
            'stock' => 25,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[1]->id,
            'nombre' => 'Botín Todo Terreno Cuero Café',
            'talla' => '40',
            'precio' => 525.00,
            'stock' => 15,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[2]->id,
            'nombre' => 'Bota Casual Colorado Miel',
            'talla' => '42',
            'precio' => 890.00,
            'stock' => 10,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[3]->id,
            'nombre' => 'Tenis Deportivo Air Zoom',
            'talla' => '39',
            'precio' => 750.00,
            'stock' => 20,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[4]->id,
            'nombre' => 'Tenis Urbanos Grand Court',
            'talla' => '41',
            'precio' => 599.00,
            'stock' => 18,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[5]->id,
            'nombre' => 'Zapato Formal de Cuero Negro',
            'talla' => '40',
            'precio' => 780.00,
            'stock' => 12,
        ]);

        Producto::create([
            'marca_id' => $marcasCreadas[9]->id,
            'nombre' => 'Bota Impermeable Yellow Boot',
            'talla' => '43',
            'precio' => 950.00,
            'stock' => 8,
        ]);

        // 4. 20 Clientes Registrados
        $clientesData = [
            ['nit' => '984835-10', 'nombre' => 'Alfredo Haniel Delvalle Escobar'],
            ['nit' => '3036086-9', 'nombre' => 'Maria Izabel Perez Enriquez'],
            ['nit' => '123456-7', 'nombre' => 'Carlos Enrique Morales Gomez'],
            ['nit' => '789012-3', 'nombre' => 'Ana Lucía Castillo Mendez'],
            ['nit' => '456789-1', 'nombre' => 'Jorge Luis Hernandez Ruano'],
            ['nit' => '654321-8', 'nombre' => 'Sofia Alejandra Morales Paz'],
            ['nit' => '112233-4', 'nombre' => 'Luis Fernando Estrada Cifuentes'],
            ['nit' => '998877-5', 'nombre' => 'Gabriela Marisol Vasquez Lima'],
            ['nit' => '334455-6', 'nombre' => 'Pedro Jose Cifuentes Monzon'],
            ['nit' => '776655-2', 'nombre' => 'Claudia Patricia Orellana Soto'],
            ['nit' => '102030-9', 'nombre' => 'Diego Alejandro Ramos Fuentes'],
            ['nit' => '405060-8', 'nombre' => 'Valeria Nicole Pineda Morales'],
            ['nit' => '708090-7', 'nombre' => 'Fernando Jose Castillo Leon'],
            ['nit' => '135790-4', 'nombre' => 'Daniela Sofia Gutierrez Diaz'],
            ['nit' => '246810-5', 'nombre' => 'Mario Roberto Mejia Caceres'],
            ['nit' => '369121-6', 'nombre' => 'Brenda Lissette Lopez Aguilar'],
            ['nit' => '741852-9', 'nombre' => 'Kevin Josue Marroquin Pineda'],
            ['nit' => '852963-1', 'nombre' => 'Andrea Yessenia Yoc Chajon'],
            ['nit' => '963147-2', 'nombre' => 'Alex David Perez Cabrera'],
            ['nit' => '159753-8', 'nombre' => 'Elvira Juarez Saquila'],
        ];

        foreach ($clientesData as $cliente) {
            Cliente::create($cliente);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Cliente;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $coban = Marca::create(['nombre' => 'Calzado Cobán Original']);
        $rhino = Marca::create(['nombre' => 'Botas Rhino']);
        $cat = Marca::create(['nombre' => 'Caterpillar']);
        $nike = Marca::create(['nombre' => 'Nike']);

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

        if (Cliente::count() == 0) {
            Cliente::create([
                'nit' => 'CF',
                'nombre' => 'Consumidor Final',
            ]);
        }
    }
}
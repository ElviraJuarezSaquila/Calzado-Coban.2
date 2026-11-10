<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'marca_id',
        'nombre',
        'talla',
        'precio',
        'stock',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
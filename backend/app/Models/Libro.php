<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // 👇 Nombre de la tabla en la BD
    protected $table = 'book_insertion';

    // 👇 Campos que se pueden asignar masivamente
    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'disponibilidad',
    ];
}

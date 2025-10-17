<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo_electronico',
        'password',
        'cedula',
        'pasaporte',
        'telefono',
        'direccion',
        'pais',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['deleted_at'];
}

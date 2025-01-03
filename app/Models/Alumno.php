<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricula',
        'correo',
        'nombre',
        'foto',
        'id_semestre',
        'id_licenciatura',
        'id_programa'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    public function materias(){
        return $this->hasMany(Materia::class,'id_programa','id');
    }
}

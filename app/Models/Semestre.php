<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'grupo',
        'alumnos'
    ];

    public function materias(){
        return $this->hasMany(Semestre::class,'id_semestre','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = "materias";
    protected $fillable = [
        'nombre',
        'id_semestre',
        'id_programa',
        'id_licenciatura',
        'id_docente'
    ];

    public function semestre(){
        return $this->belongsTo(Semestre::class,'id_semestre','id');
    }

    public function programa(){
        return $this->belongsTo(Programa::class,'id_programa','id');
    }

    public function licenciatura(){
        return $this->belongsTo(Licenciatura::class,'id_licenciatura','id');
    }

    public function docente(){
        return $this->belongsTo(Docente::class,'id_docente','id');
    }
}

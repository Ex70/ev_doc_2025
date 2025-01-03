<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller{
    public function index(){
        $semestres = Semestre::all();
        return view ('semestres.index')->with("semestres",$semestres);
    }

    public function create(Request $req){
        $semestre = new Semestre();
        $semestre->nombre = $req->nombre;
        $semestre->grupo = $req->grupo;
        $semestre->alumnos = $req->alumnos;
        $semestre->save();
        return redirect('/semestres');
    }

    public function edit(Request $req){
        $semestre = Semestre::find($req->id);
        return view('semestres.editar')->with("semestre",$semestre);
    }

    public function update(Request $req){
        $semestre=Semestre::find($req->id);
        $semestre->update([
            'nombre' => $req->nombre,
            'grupo' => $req->grupo,
            'alumnos' => $req->alumnos
        ]);
        return redirect('/semestres');
    }

    public function destroy(Request $req){
        $semestre = Semestre::find($req->id);
        $semestre->delete();
        return redirect('/semestres');
    }
}

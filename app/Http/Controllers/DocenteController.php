<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller{
    public function index(){
        $docentes = Docente::all();
        return view ('docentes.index')->with("docentes",$docentes);
    }

    public function create(Request $req){
        $docente = new Docente();
        $docente->nombre = $req->nombre;
        $docente->correo = $req->correo;
        $docente->foto = $req->foto;
        $docente->save();
        return redirect('/docentes');
    }

    public function edit(Request $req){
        $docente = Docente::find($req->id);
        return view('docentes.editar')->with("docente",$docente);
    }

    public function update(Request $req){
        $docente=Docente::find($req->id);
        $docente->update([
            'nombre' => $req->nombre,
            'correo' => $req->correo,
            'foto' => $req->foto
        ]);
        return redirect('/docentes');
    }

    public function destroy(Request $req){
        $docente = Docente::find($req->id);
        $docente->delete();
        return redirect('/docentes');
    }
}

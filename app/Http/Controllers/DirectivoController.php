<?php

namespace App\Http\Controllers;

use App\Models\Directivo;
use Illuminate\Http\Request;

class DirectivoController extends Controller{
    public function index(){
        $directivos = Directivo::all();
        return view ('directivos.index')->with("directivos",$directivos);
    }

    public function create(Request $req){
        $directivo = new Directivo();
        $directivo->nombre = $req->nombre;
        $directivo->correo = $req->correo;
        $directivo->foto = $req->foto;
        $directivo->save();
        return redirect('/directivos');
    }

    public function edit(Request $req){
        $directivo = Directivo::find($req->id);
        return view('directivos.editar')->with("directivo",$directivo);
    }

    public function update(Request $req){
        $docente=Directivo::find($req->id);
        $docente->update([
            'nombre' => $req->nombre,
            'correo' => $req->correo,
            'foto' => $req->foto
        ]);
        return redirect('/directivos');
    }

    public function destroy(Request $req){
        $directivo = Directivo::find($req->id);
        $directivo->delete();
        return redirect('/directivos');
    }
}

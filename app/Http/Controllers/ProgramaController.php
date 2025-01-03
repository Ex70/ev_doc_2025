<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use App\Models\Modalidad;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller{
    public function index(){
        $programas = Programa::all();
        $licenciaturas = Licenciatura::all();
        $modalidades = Modalidad::all();
        return view('programas.index', compact('programas','licenciaturas','modalidades'));
    }

    public function create(Request $req){
        $programa = new Programa();
        $programa->nombre = $req->nombre;
        $programa->id_licenciatura = $req->id_licenciatura;
        $programa->id_modalidad = $req->id_modalidad;
        $programa->save();
        return redirect('/programas');
    }

    public function edit(Request $req){
        $programa = Programa::find($req->id);
        return view('programas.editar')->with("programa",$programa);
    }

    public function update(Request $req){
        $programa=Programa::find($req->id);
        $programa->update([
            'nombre' => $req->nombre
        ]);
        return redirect('/programas');
    }

    public function destroy(Request $req){
        $programa = Programa::find($req->id);
        $programa->delete();
        return redirect('/programas');
    }
}

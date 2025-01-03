<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller{
    public function index(){
        $programas = Programa::all();
        return view ('programas.index')->with("programas",$programas);
    }

    public function create(Request $req){
        $programa = new Programa();
        $programa->nombre = $req->nombre;
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

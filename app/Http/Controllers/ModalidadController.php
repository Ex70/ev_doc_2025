<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller{
    public function index(){
        $modalidades = Modalidad::all();
        return view ('modalidades.index')->with("modalidades",$modalidades);
    }

    public function create(Request $req){
        $modalides = new Modalidad();
        $modalides->nombre = $req->nombre;
        $modalides->save();
        return redirect('/modalidades');
    }

    public function edit(Request $req){
        $licenciatura = Licenciatura::find($req->id);
        return view('licenciaturas.editar')->with("licenciatura",$licenciatura);
    }

    public function update(Request $req){
        $licenciatura=Licenciatura::find($req->id);
        $licenciatura->update([
            'siglas' => $req->siglas,
            'nombre' => $req->nombre
        ]);
        return redirect('/licenciaturas');
    }

    public function destroy(Request $req){
        $licenciatura = Licenciatura::find($req->id);
        $licenciatura->delete();
        return redirect('/licenciaturas');
    }
}

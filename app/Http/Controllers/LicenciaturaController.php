<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use Illuminate\Http\Request;

class LicenciaturaController extends Controller{
    public function index(){
        $licenciaturas = Licenciatura::all();
        return view ('licenciaturas.index')->with("licenciaturas",$licenciaturas);
    }

    public function create(Request $req){
        $licenciatura = new Licenciatura();
        $licenciatura->siglas = $req->siglas;
        $licenciatura->nombre = $req->nombre;
        $licenciatura->save();
        return redirect('/licenciaturas');
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

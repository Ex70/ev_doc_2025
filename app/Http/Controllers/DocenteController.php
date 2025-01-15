<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocenteController extends Controller{
    public function index(){
        // $docentes = Docente::all();
        $docentes=Docente::orderBy('nombre', 'ASC')->get();
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
        // dd($req->foto);
        $filename = NULL;
        $path = NULL;
        if ($image = $req->has('foto')) {
            // dd("HOLA");
            $file = $req->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path, $filename);
            if(File::exists($docente->image)){
                File::delete($docente->image);
            }
        }else{
            unset($req->foto);
        }
        $docente->update([
            'nombre' => $req->nombre,
            'correo' => $req->correo,
            'foto' => $path.$filename
        ]);
        return redirect('/docentes');
    }

    public function destroy(Request $req){
        $docente = Docente::find($req->id);
        $docente->delete();
        return redirect('/docentes');
    }
}

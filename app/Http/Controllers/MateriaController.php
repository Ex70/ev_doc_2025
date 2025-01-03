<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Licenciatura;
use App\Models\Materia;
use App\Models\Programa;
use App\Models\Semestre;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $semestres = Semestre::all();
        $programas = Programa::all();
        $licenciaturas = Licenciatura::all();
        $docentes = Docente::all();
        // $programa = Programa::find(1);
        // $materias = $programas->materias;
        $materias = Materia::all();
        // dd($materias);
        return view('materias.index', compact('semestres','programas','licenciaturas','docentes','materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req){
        $materia = Materia::find($req->id);
        return view('materias.editar')->with("materia",$materia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
    }

    public function add(Request $req){
        $materia = new Materia();
        $materia->nombre = $req->nombre;
        $materia->id_semestre = $req->id_semestre;
        $materia->id_programa = $req->id_programa;
        $materia->id_licenciatura = $req->id_licenciatura;
        $materia->id_docente = $req->id_docente;
        $materia->save();
        return redirect('/materias');
    }
}

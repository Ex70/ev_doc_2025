<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Licenciatura;
use App\Models\Programa;
use App\Models\Semestre;
use Illuminate\Http\Request;

class AlumnoController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $semestres = Semestre::all();
        $licenciaturas = Licenciatura::all();
        $programas = Programa::all();
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('semestres','licenciaturas','alumnos','programas'));
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
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    public function add(Request $req){
        $materia = new Alumno();
        $materia->matricula = $req->matricula;
        $materia->correo = $req->correo;
        $materia->nombre = $req->nombre;
        $materia->id_semestre = $req->id_semestre;
        $materia->id_licenciatura = $req->id_licenciatura;
        $materia->id_programa = $req->id_programa;
        $materia->save();
        return redirect('/alumnos');
    }
}

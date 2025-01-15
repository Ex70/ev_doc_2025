<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Docente;
use App\Models\Licenciatura;
use App\Models\Materia;
use App\Models\Programa;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuestionarioController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req){
        $observ = "";
        $resultados = "";
        $horas = "";
        $maestro="";
        if(isset($req->id_docente)){
            // dd("HOLA");
            // $total_p1 = $total_p2 = $total_p3 = $total_p4 = $total_p5 = $total_p6 = $total_p7 = $total_p8 = $total_p9 = $total_p10 = $total_p11 = 0;
            // $total_p1 = Cuestionario::sum('pregunta1','pregunta2','pregunta3','pregunta4','pregunta5','pregunta6','pregunta7','pregunta8','pregunta9','pregunta10','pregunta11')->where('docente','like','%Elia Abadesa González Rodríguez%')->get();
            // $total_p1 = Cuestionario::where('docente','like','%Elia Abadesa González Rodríguez%')
            // ->sum(\DB::raw('pregunta1 + pregunta2 + pregunta3 + pregunta4 + pregunta5 + pregunta6 + pregunta7 + pregunta8 + pregunta9 + pregunta10+pregunta11'));
            // dd($total_p1);
            $maestro=Docente::select('nombre','foto')->where('id',$req->id_docente)->get();
            $horas=Materia::where('id_docente',$req->id_docente)->sum('horas_ciclo');
            // dd($horas);
            $resultados=DB::table('cuestionarios')->select(['docente',
                DB::raw('COUNT(distinct correo) as alumnos'),
                DB::raw('SUM(pregunta1+pregunta2+pregunta3+pregunta4+pregunta5+pregunta6+pregunta7+pregunta8+pregunta9+pregunta10+pregunta11) as resultados')])
                ->where('docente','like',"%".$maestro[0]->nombre."%")
                ->groupBy('docente')
                ->get();
        // dd($docente->id_docente);
        // dd($docente[0]->nombre);
        $cadenaPrueba=Cuestionario::latest()->first();
        // dd(e($cadenaPrueba->docente));
        $cadena="Daniel Sandria Flores-Seminario II de Proyectos de Investigación ( Ciencia de Datos)-ISC901";
        $guion1=strpos($cadena,'-');
        $docente=substr($cadena,0,$guion1);
        // dd($cadenaPrueba);
        $cadena2=substr($cadena,$guion1+1);
        $guion2=strpos($cadena2,'-');
        $materia=substr($cadena2,0,$guion2);
        // dd($materia);
        $grupo=substr($cadena2,$guion2+1);
        // dd($grupo);
        $observaciones = Cuestionario::select('pregunta12')->where('docente','like',"%".$maestro[0]->nombre."%")->whereRaw('char_length(pregunta12) > 2')->get();
        // dd($observaciones);
        foreach ($observaciones as $value => $observacion) {
            // dd($observacion);
            $observ.= $observacion['pregunta12'].PHP_EOL.PHP_EOL;
        }
    }
        $cuestionarios = Cuestionario::all()->toArray();
        // $semestres = Semestre::all();
        // $programas = Programa::all();
        // $licenciaturas = Licenciatura::all();
        // $materias = Materia::all();
        $docentes=Docente::orderBy('nombre', 'ASC')->get();
        return view('cuestionarios.index', compact('docentes','cuestionarios','resultados','observ','horas','maestro'));
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
    public function show(Cuestionario $cuestionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuestionario $cuestionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuestionario $cuestionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuestionario $cuestionario)
    {
        //
    }
}

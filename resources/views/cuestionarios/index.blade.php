@extends('adminlte::page')

@section('title', 'Activos EHS - Cuestionarios')

@section('content_header')
    <h1>Cuestionarios</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card p-3">
                    <h5>Consultar formularios restantes</h5>
                    <form method="POST" enctype="multipart/form-data" action="/cuestionarios/consulta">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Correo/Matrícula</label>
                            <input name="correo" required class="form-control" placeholder="Ingrese correo del alumno" />
                            @error('correo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione grupo</label>
                            <select required name="grupo" class="form-control">
                                @foreach ($semestres as $semestre)
                                    <option value="{{ $semestre->id }}">{{ $semestre->nombre }} - {{$semestre->grupo}}</option>
                                @endforeach
                            </select>
                            @error('grupo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione programa</label>
                            <select required name="programa" class="form-control">
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('programa')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary w-100">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table align="center" style="border: 3px #000000 solid">
            <thead>
                <tr>
                    <th style="border: 3px #000000 solid" class="text-center" >N°</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Fotografía</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Nombre del docente</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Asignatura</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Grupo</th>
                    <th style="border: 3px #000000 solid" class="text-center" ># Alumnos</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Eval. Alumnos %</th>
                    <th style="border: 3px #000000 solid" class="text-center" >Final Alumnos % TOTAL</th>
                    <th style="border: 3px #000000 solid" class="text-center" >HORAS CICLO</th>
                    <th style="border: 3px #000000 solid" class="text-center" >OBSERVACIONES</th>
                    {{-- <th style="border: 3px #000000 solid">% total</th>
                    <th style="border: 3px #000000 solid">Horas Ciclo</th>
                    <th style="border: 3px #000000 solid">Observaciones</th> --}}
                </tr>
            </thead>

            <?php
                $grouped_reports = [];
                $last_name = null;
                $group = null;
                $totalAlumnos=0;
                foreach ($resultados as $report) {
                    $cadena=$report->docente;
                    $guion1=strpos($cadena,'-');
                    $docente=substr($cadena,0,$guion1);
                    $cadena2=substr($cadena,$guion1+1);
                    $guion2=strpos($cadena2,'-');
                    $materia=substr($cadena2,0,$guion2);
                    $grupo=substr($cadena2,$guion2+1);
                    $promedio1=number_format((($report->resultados)*10)/(($report->alumnos)*55),2);
                    $totalAlumnos += $promedio1;
                    echo $totalAlumnos.'         =       ';

                    if ($report->docente != $last_name) {
                        if ($group) {
                            $grouped_reports[] = $group;
                        }
                        $group=[
                            'docente' => $docente,
                            // 'foto' => $report->foto,
                            'materias'=>[]
                        ];
                    }
                    $group['materias'][] = ['asignatura' => $materia, 'grupo' => $grupo, 'alumnos' => $report->alumnos, 'promedio' => $promedio1];
                }
                // Add last group to $grouped_reports
                if ($group) {
                    $grouped_reports[] = $group;
                }
                print_r($grouped_reports);
            ?>

            <tbody>
                <?php $i=0; foreach ($grouped_reports as $key=>$report){
                    $rowspan = count($grouped_reports);
                    if ($key > 0) continue;?>
                    <tr>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">1</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">FOTO</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">{{$report['docente']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['asignatura']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['grupo']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['alumnos']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['promedio']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">{{number_format(($totalAlumnos/count($grouped_reports)),2)}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}"></td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}"></td>
                    </tr>
                        <?php foreach ($grouped_reports as $key=>$report){
                            if ($key < 1) continue;?>
                            <tr>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['asignatura']}}</td>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['grupo']}}</td>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['alumnos']}}</td>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['promedio']}}</td>
                                </tr>
                                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <br><br>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
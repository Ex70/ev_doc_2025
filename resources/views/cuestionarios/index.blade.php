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
                    <h5>Consultar reporte</h5>
                    <form method="POST" enctype="multipart/form-data" action="/cuestionarios/">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione docente</label>
                            <select required name="id_docente" class="form-control">
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                @endforeach
                            </select>
                            @error('docente')
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
        @if($resultados != "")
        <table align="center" class="cuestionarios" style="border: 3px #000000 solid">
            <thead>
                <tr>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >N°</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Fotografía</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Nombre del docente</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Asignatura</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Grupo</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" ># Alumnos</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Eval. Alumnos %</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >Final Alumnos % TOTAL</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >HORAS CICLO</th>
                    <th style="border: 3px #000000 solid;padding-top: 12px;padding-bottom: 12px;background-color: #0C5395;color: white;" class="text-center" >OBSERVACIONES</th>
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
                    // echo $cadena.'         =       ';

                    if ($report->docente != $last_name) {
                        if ($group) {
                            $grouped_reports[] = $group;
                        }
                        $group=[
                            'docente' => $docente,
                            // 'foto' => $maestro->foto,
                            'materias'=>[]
                        ];
                    }
                    $group['materias'][] = ['asignatura' => $materia, 'grupo' => $grupo, 'alumnos' => $report->alumnos, 'promedio' => $promedio1];
                }
                // Add last group to $grouped_reports
                if ($group) {
                    $grouped_reports[] = $group;
                }
                // $textoPrueba = str_replace("<br />", PHP_EOL, nl2br($observ));
                // print_r(nl2br($observ));
            ?>

            <tbody style="background-color: white">
                <?php $i=0; foreach ($grouped_reports as $key=>$report){
                    $rowspan = count($grouped_reports);
                    if ($key > 0) continue;?>
                    <tr>
                        <td  style="border: 3px #000000 solid;font-weight: bold;font-size: 30px;" class="text-center" rowspan="{{$rowspan}}">1</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}"><img src="{{asset($maestro[0]['foto'])}}" width="100px"></td>
                        {{-- <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}"><img src="https://imageplaceholder.net/150"></td> --}}
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">{{$docente}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['asignatura']}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['grupo']}}</td>
                        <td  style="border: 3px #000000 solid;font-weight: bold;font-size: 20px;" class="text-center">{{$report['materias'][0]['alumnos']}}</td>
                        <td  style="border: 3px #000000 solid;font-weight: bold;font-size: 30px;" class="text-center">{{$report['materias'][0]['promedio']}}</td>
                        <td  style="border: 3px #000000 solid;font-weight: bold;font-size: 30px;color:#0905DD" class="text-center" rowspan="{{$rowspan}}">{{number_format(($totalAlumnos/count($grouped_reports)),2)}}</td>
                        <td  style="border: 3px #000000 solid;font-weight: bold;font-size: 30px;color:#9F3630" class="text-center" rowspan="{{$rowspan}}">{{$horas}}</td>
                        <td  style="border: 3px #000000 solid" class="text-center" rowspan="{{$rowspan}}">{!! nl2br(e($observ)) !!}</td>
                    </tr>
                        <?php foreach ($grouped_reports as $key=>$report){
                            if ($key < 1) continue;?>
                            <tr>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['asignatura']}}</td>
                                    <td style="border: 3px #000000 solid" class="text-center">{{$report['materias'][0]['grupo']}}</td>
                                    <td style="border: 3px #000000 solid;font-weight: bold;font-size: 20px;" class="text-center">{{$report['materias'][0]['alumnos']}}</td>
                                    <td style="border: 3px #000000 solid;font-weight: bold;font-size: 30px;" class="text-center">{{$report['materias'][0]['promedio']}}</td>
                                </tr>
                                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        @endif
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
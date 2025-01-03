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
                    <th style="border: 3px #000000 solid">N°</th>
                    <th style="border: 3px #000000 solid">Fotografía</th>
                    <th style="border: 3px #000000 solid">Nombre del docente</th>
                    <th style="border: 3px #000000 solid">Asignatura</th>
                    <th style="border: 3px #000000 solid">Grupo</th>
                    <th style="border: 3px #000000 solid"># Alumnos</th>
                    <th style="border: 3px #000000 solid">Eval. Alumnos %</th>
                    <th style="border: 3px #000000 solid">% total</th>
                    <th style="border: 3px #000000 solid">Horas Ciclo</th>
                    <th style="border: 3px #000000 solid">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2" style="border: 3px #000000 solid">1</td>
                    <td rowspan="2" style="border: 3px #000000 solid"> </td>
                    <td rowspan="2" style="border: 3px #000000 solid">Edgar Hernández Martínez</td>
                    <td style="border: 3px #000000 solid">Estructura de Datos II</td>
                    <td style="border: 3px #000000 solid">ISC301</td>
                    <td style="border: 3px #000000 solid">9</td>
                    <td style="border: 3px #000000 solid">Promedio 1</td>
                    <td rowspan="2" style="border: 3px #000000 solid">Promedio 2</td>
                    <td rowspan="2" style="border: 3px #000000 solid">4 Horas</td>
                    <td rowspan="2" style="border: 3px #000000 solid">Observaciones totales</td>
                </tr>
                <tr>
                    <td style="border: 3px #000000 solid">Cell 1x2</td>
                    <td style="border: 3px #000000 solid">Cell 2x2</td>
                    <td style="border: 3px #000000 solid">Cell 3x2</td>
                    <td style="border: 3px #000000 solid">Cell 4x2</td>
                </tr>
                <tr>
                    <td style="border: 3px #000000 solid">Cell 1x3</td>
                    <td style="border: 3px #000000 solid">Cell 2x3</td>
                    <td style="border: 3px #000000 solid">Cell 3x3</td>
                    <td style="border: 3px #000000 solid">Cell 4x3</td>
                </tr>
                <tr>
                    <td style="border: 3px #000000 solid">Cell 1x4</td>
                    <td style="border: 3px #000000 solid">Cell 2x4</td>
                    <td style="border: 3px #000000 solid">Cell 3x4</td>
                    <td style="border: 3px #000000 solid">Cell 4x4</td>
                    <td style="border: 3px #000000 solid">Cell 5x4</td>
                    <td style="border: 3px #000000 solid">Cell 6x4</td>
                    <td style="border: 3px #000000 solid">Cell 7x4</td>
                    <td style="border: 3px #000000 solid">Cell 8x4</td>
                    <td style="border: 3px #000000 solid">Cell 9x4</td>
                    <td style="border: 3px #000000 solid">Cell 10x4</td>
                </tr>
                <tr>
                    <td style="border: 3px #000000 solid">Cell 1x5</td>
                    <td style="border: 3px #000000 solid">Cell 2x5</td>
                    <td style="border: 3px #000000 solid">Cell 3x5</td>
                    <td style="border: 3px #000000 solid">Cell 4x5</td>
                    <td style="border: 3px #000000 solid">Cell 5x5</td>
                    <td style="border: 3px #000000 solid">Cell 6x5</td>
                    <td style="border: 3px #000000 solid">Cell 7x5</td>
                    <td style="border: 3px #000000 solid">Cell 8x5</td>
                    <td style="border: 3px #000000 solid">Cell 9x5</td>
                    <td style="border: 3px #000000 solid">Cell 10x5</td>
                </tr>
                <tr>
                    <td style="border: 3px #000000 solid">Cell 1x6</td>
                    <td style="border: 3px #000000 solid">Cell 2x6</td>
                    <td style="border: 3px #000000 solid">Cell 3x6</td>
                    <td style="border: 3px #000000 solid">Cell 4x6</td>
                    <td style="border: 3px #000000 solid">Cell 5x6</td>
                    <td style="border: 3px #000000 solid">Cell 6x6</td>
                    <td style="border: 3px #000000 solid">Cell 7x6</td>
                    <td style="border: 3px #000000 solid">Cell 8x6</td>
                    <td style="border: 3px #000000 solid">Cell 9x6</td>
                    <td style="border: 3px #000000 solid">Cell 10x6</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
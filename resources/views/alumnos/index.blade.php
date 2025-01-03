@extends('adminlte::page')

@section('title', 'Evaluación Docente UEH - Alumnos')

@section('content_header')
    <h1>Alumnos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card p-3">
                    <h5>Agregar nuevo alumno</h5>
                    <form method="POST" enctype="multipart/form-data" action="/alumnos/agregarAlumno">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Matrícula</label>
                            <input name="matricula" required class="form-control" placeholder="Ingrese matricula" />
                            @error('matricula')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Correo</label>
                            <input name="correo" required class="form-control" placeholder="Ingrese correo" />
                            @error('correo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" required class="form-control" placeholder="Ingrese nombre" />
                            @error('nombre')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione el semestre actual</label>
                            <select required name="id_semestre" class="form-control">
                                @foreach ($semestres as $semestre)
                                    <option value="{{ $semestre->id }}">{{ $semestre->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_semestre')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione Licenciatura</label>
                            <select required name="id_licenciatura" class="form-control">
                                @foreach ($licenciaturas as $licenciatura)
                                    <option value="{{ $licenciatura->id }}">{{ $licenciatura->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_licenciatura')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Seleccione Programa</label>
                            <select required name="id_programa" class="form-control">
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_programa')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label class="form-label">Foto de referencia</label>
                            <input name="picture" type="file" required class="form-control" />
                            @error('picture')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary w-100">Agregar alumno</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
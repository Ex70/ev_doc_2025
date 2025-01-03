@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Programas')

@section('content_header')
    <h1>Catálogo de Programas</h1>
@stop

@section('content')
        <div class="container mt-5">
            <form method="POST" action="/programas/agregarPrograma">
                @csrf
                <div class="form-group mb-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Seleccione la licenciatura</label>
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
                    <label class="form-label">Seleccione la modalidad</label>
                    <select required name="id_modalidad" class="form-control">
                        @foreach ($modalidades as $modalidad)
                            <option value="{{ $modalidad->id }}">{{ $modalidad->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_modalidad')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Licenciatura</th>
                        <th scope="col">Modalidad</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($programas) > 0)
                        @foreach ($programas as $programa)
                            <tr>
                                <th>{{ $programa->id }}</th>
                                <th>{{ $programa->nombre }}</th>
                                <th>{{ $programa->id_licenciatura }}</th>
                                <th>{{ $programa->id_modalidad }}</th>
                                <th><a href="/programas/editar/{{ $programa->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/programas/borrar/{{ $programa->id }}" class="btn btn-danger">Borrar</a>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th>Sin información</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @stop

        @section('css')
            {{-- Add here extra stylesheets --}}
            {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop

        @section('js')
        @stop
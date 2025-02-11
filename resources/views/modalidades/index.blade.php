@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Modalidades')

@section('content_header')
    <h1>Catálogo de Modalidades</h1>
@stop

@section('content')
        <div class="container mt-5">
            <form method="POST" action="/modalidades/agregarModalidad">
                @csrf
                <div class="form-group mb-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($modalidades) > 0)
                        @foreach ($modalidades as $modalidad)
                            <tr>
                                <th>{{ $modalidad->id }}</th>
                                <th>{{ $modalidad->nombre }}</th>
                                <th><a href="/modalidades/editar/{{ $modalidad->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/modalidades/borrar/{{ $modalidad->id }}" class="btn btn-danger">Borrar</a>
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
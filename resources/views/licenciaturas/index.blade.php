@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Licenciaturas')

@section('content_header')
    <h1>Catálogo de Licenciaturas</h1>
@stop

@section('content')
        <div class="container mt-5">
            <form method="POST" action="/licenciaturas/agregarLicenciatura">
                @csrf
                <div class="form-group mb-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group mb-2">
                    <label>Siglas</label>
                    <input type="text" class="form-control" name="siglas" placeholder="Siglas">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Siglas</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($licenciaturas) > 0)
                        @foreach ($licenciaturas as $licenciatura)
                            <tr>
                                <th>{{ $licenciatura->id }}</th>
                                <th>{{ $licenciatura->nombre }}</th>
                                <th>{{ $licenciatura->siglas }}</th>
                                <th><a href="/licenciaturas/editar/{{ $licenciatura->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/licenciaturas/borrar/{{ $licenciatura->id }}" class="btn btn-danger">Borrar</a>
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
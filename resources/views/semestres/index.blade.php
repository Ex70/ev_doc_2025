@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Semestres')

@section('content_header')
    <h1>Catálogo de Semestres</h1>
@stop

@section('content')
        <div class="container mt-5">
            <form method="POST" action="/semestres/agregarSemestre">
                @csrf
                <div class="form-group mb-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group mb-2">
                    <label>Grupo</label>
                    <input type="text" class="form-control" name="grupo" placeholder="Grupo">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Grupo</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($semestres) > 0)
                        @foreach ($semestres as $semestre)
                            <tr>
                                <th>{{ $semestre->id }}</th>
                                <th>{{ $semestre->nombre }}</th>
                                <th>{{ $semestre->grupo }}</th>
                                <th><a href="/semestres/editar/{{ $semestre->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/semestres/borrar/{{ $semestre->id }}" class="btn btn-danger">Borrar</a>
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
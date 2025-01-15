@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Materias')

@section('content_header')
    <h1>Materia</h1>
@stop

@section('content')
<div class="container mt-5">
    <form method="POST" action="/materias/editar/{{$materia->id}}">
        @csrf
        {{-- <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$materia->nombre}}">
        </div>
        <div class="form-group mb-2">
            <label>Grupo</label>
            <input type="text" class="form-control" name="grupo" placeholder="Grupo" value="{{$materia->grupo}}">
        </div> --}}
        <div class="form-group mb-2">
            <label>Horas Ciclo</label>
            <input type="number" class="form-control" name="horas_ciclo" placeholder="Horas ciclo" step="0.5" value="{{$materia->horas_ciclo}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
        @stop

        @section('css')
            {{-- Add here extra stylesheets --}}
            {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop

        @section('js')
        @stop
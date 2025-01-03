@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Semestres')

@section('content_header')
    <h1>Semestre</h1>
@stop

@section('content')
<div class="container mt-5">
    <form method="POST" action="/semestres/editar/{{$semestre->id}}">
        @csrf
        <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$semestre->nombre}}">
        </div>
        <div class="form-group mb-2">
            <label>Grupo</label>
            <input type="text" class="form-control" name="grupo" placeholder="Grupo" value="{{$semestre->grupo}}">
        </div>
        <div class="form-group mb-2">
            <label>Alumnos</label>
            <input type="number" class="form-control" name="alumnos" placeholder="Alumnos" value="{{$semestre->alumnos}}">
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
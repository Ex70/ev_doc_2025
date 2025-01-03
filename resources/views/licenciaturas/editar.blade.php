@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Licenciaturas')

@section('content_header')
    <h1>Licenciaturas</h1>
@stop

@section('content')
<div class="container mt-5">
    <form method="POST" action="/licenciaturas/editar/{{$licenciatura->id}}">
        @csrf
        <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$licenciatura->nombre}}">
        </div>
        <div class="form-group mb-2">
            <label>Siglas</label>
            <input type="text" class="form-control" name="siglas" placeholder="Siglas" value="{{$licenciatura->siglas}}">
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
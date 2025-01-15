@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Editar Docentes')

@section('content_header')
    <h1>Editar docente: {{$docente->nombre}}</h1>
@stop

@section('content')
<div class="container mt-5">
    <form method="POST" action="/docentes/editar/{{$docente->id}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$docente->nombre}}">
        </div>
        <div class="form-group mb-2">
            <label>Correo</label>
            <input type="text" class="form-control" name="correo" placeholder="Correo" value="{{$docente->correo}}">
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
                <img src="/images/{{ $product->image }}" width="300px">
            </div>
        </div> --}}
        <div class="form-group mb-2">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" placeholder="Foto" value="{{$docente->foto}}">
            <img src="/images/{{ $docente->foto }}" width="300px">
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
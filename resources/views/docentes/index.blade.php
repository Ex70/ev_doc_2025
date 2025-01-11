@extends('adminlte::page')

@section('title', 'UEH Evaluación Docente - Docentes')

@section('content_header')
    <h1>Catálogo de Docentes</h1>
@stop

{{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'Nombre',
    'Correo',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

@endphp

@section('content')
        <div class="container mt-5">
            <form method="POST" action="/docentes/agregarDocente">
                @csrf
                <div class="form-group mb-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group mb-2">
                    <label>Correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="Correo institucional">
                </div>
                <div class="form-group mb-2">
                    <label>Foto</label>
                    <input type="text" class="form-control" name="foto" placeholder="Foto">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <x-adminlte-datatable id="table1" :heads="$heads">
            {{-- <table class="table mt-5"> --}}
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($docentes) > 0)
                        @foreach ($docentes as $docente)
                            <tr>
                                <th>{{ $docente->id }}</th>
                                <th>{{ $docente->nombre }}</th>
                                <th>{{ $docente->correo }}</th>
                                <th><a href="/docentes/editar/{{ $docente->id }}" class="btn btn-primary">Editar</a>
                                    <a href="/docentes/borrar/{{ $docente->id }}" class="btn btn-danger">Borrar</a>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th>Sin información</th>
                        </tr>
                    @endif
                </tbody>
            </x-adminlte-datatable>
        {{-- </table> --}}
        </div>
        @stop

        @section('css')
            {{-- Add here extra stylesheets --}}
            {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop

        @section('js')
        @stop
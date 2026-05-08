@extends('adminlte::page')

@section('title', 'Detalle Alumno')

@section('content_header')
    <h1><i class="fas fa-id-card"></i> Detalle del Alumno</h1>
@stop

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Información del alumno</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="width:30%">Número de Control</th>
                    <td>{{ $alumno->Num_Control }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $alumno->Nombre }}</td>
                </tr>
                <tr>
                    <th>Primer Apellido</th>
                    <td>{{ $alumno->Primer_ap }}</td>
                </tr>
                <tr>
                    <th>Segundo Apellido</th>
                    <td>{{ $alumno->Segundo_Ap }}</td>
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>{{ $alumno->Fecha_Nac }}</td>
                </tr>
                <tr>
                    <th>Semestre</th>
                    <td>{{ $alumno->Semestre }}</td>
                </tr>
                <tr>
                    <th>Carrera</th>
                    <td>{{ $alumno->Carrera }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Regresar
            </a>
            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
        </div>
    </div>
@stop

@section('css')@stop
@section('js')@stop
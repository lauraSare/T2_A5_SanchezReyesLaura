@extends('adminlte::page')

@section('title', 'Nuevo Alumno')

@section('content_header')
    <h1><i class="fas fa-user-plus"></i> Agregar Alumno</h1>
@stop

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Formulario de registro</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('alumnos.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Número de Control</label>
                            <input type="text" name="Num_Control" 
                                   class="form-control @error('Num_Control') is-invalid @enderror" 
                                   value="{{ old('Num_Control') }}">
                            @error('Num_Control')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" 
                                   class="form-control @error('Nombre') is-invalid @enderror" 
                                   value="{{ old('Nombre') }}">
                            @error('Nombre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input type="text" name="Primer_ap" 
                                   class="form-control @error('Primer_ap') is-invalid @enderror" 
                                   value="{{ old('Primer_ap') }}">
                            @error('Primer_ap')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input type="text" name="Segundo_Ap" 
                                   class="form-control @error('Segundo_Ap') is-invalid @enderror" 
                                   value="{{ old('Segundo_Ap') }}">
                            @error('Segundo_Ap')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="Fecha_Nac" 
                                   class="form-control @error('Fecha_Nac') is-invalid @enderror" 
                                   value="{{ old('Fecha_Nac') }}">
                            @error('Fecha_Nac')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Semestre</label>
                            <input type="number" name="Semestre" min="1" max="12"
                                   class="form-control @error('Semestre') is-invalid @enderror" 
                                   value="{{ old('Semestre') }}">
                            @error('Semestre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Carrera</label>
                            <input type="text" name="Carrera" 
                                   class="form-control @error('Carrera') is-invalid @enderror" 
                                   value="{{ old('Carrera') }}">
                            @error('Carrera')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </form>
        </div>
    </div>
@stop

@section('css')@stop
@section('js')@stop
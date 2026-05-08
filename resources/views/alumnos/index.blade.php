@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1><i class="fas fa-user-graduate"></i> Lista de Alumnos</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Alumnos registrados</h3>
            <div class="card-tools d-flex">
                <form action="{{ route('alumnos.index') }}" method="GET" class="mr-2">
                    <div class="input-group input-group-sm">
                        <input type="text" name="filtro" class="form-control" 
                               placeholder="Buscar por nombre..." value="{{ $filtro }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('alumnos.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Nuevo Alumno
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            @if(session('exito'))
                <div class="alert alert-success m-3">
                    <i class="fas fa-check-circle"></i> {{ session('exito') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0" 
                       id="tabla-alumnos" style="width:100%">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th style="width:12%">Num. Control</th>
                            <th style="width:12%">Nombre</th>
                            <th style="width:13%">Primer Apellido</th>
                            <th style="width:13%">Segundo Apellido</th>
                            <th style="width:12%">Fecha Nac.</th>
                            <th style="width:8%">Semestre</th>
                            <th style="width:15%">Carrera</th>
                            <th style="width:15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->Num_Control }}</td>
                            <td>{{ $alumno->Nombre }}</td>
                            <td>{{ $alumno->Primer_ap }}</td>
                            <td>{{ $alumno->Segundo_Ap }}</td>
                            <td>{{ $alumno->Fecha_Nac }}</td>
                            <td class="text-center">{{ $alumno->Semestre }}</td>
                            <td>{{ $alumno->Carrera }}</td>
                            <td class="text-center" style="white-space:nowrap">
                                <a href="{{ route('alumnos.show', $alumno->id) }}" 
                                   class="btn btn-info btn-sm" title="Ver detalle">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('alumnos.edit', $alumno->id) }}" 
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" 
                                      method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            title="Eliminar"
                                            onclick="return confirm('¿Seguro que deseas eliminar este alumno?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                <i class="fas fa-inbox"></i> No hay alumnos registrados
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $alumnos->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
<style>
    .table td, .table th {
        vertical-align: middle !important;
        font-size: 13px;
    }
    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }
    .pagination {
        margin: 0;
        float: right;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#tabla-alumnos').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
            },
            paging: false,
            searching: false,
            info: false,
            ordering: true,
            dom: 'Brt',
            buttons: [
                { extend: 'excel', text: '<i class="fas fa-file-excel"></i> Excel' },
                { extend: 'pdf',   text: '<i class="fas fa-file-pdf"></i> PDF' },
                { extend: 'print', text: '<i class="fas fa-print"></i> Imprimir' }
            ]
        });
    });
</script>
@stop
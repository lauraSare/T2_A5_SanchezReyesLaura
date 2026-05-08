<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    // CONSULTA - Lista todos
    public function index(Request $request){
        $filtro = $request->input('filtro', '');
        $alumnos = Alumno::where('Nombre', 'like', '%'.$filtro.'%')
                        ->orWhere('Primer_ap', 'like', '%'.$filtro.'%')
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        return view('alumnos.index', compact('alumnos', 'filtro'));
    }

    // ALTA - Mostrar formulario
    public function create(){
        return view('alumnos.crear');
    }

    // ALTA - Guardar en BD
    public function store(Request $request){
        $request->validate([
            'Num_Control' => 'required|unique:alumnos',
            'Nombre'      => 'required',
            'Primer_ap'   => 'required',
            'Segundo_Ap'  => 'required',
            'Fecha_Nac'   => 'required|date',
            'Semestre'    => 'required|integer',
            'Carrera'     => 'required',
        ]);
        Alumno::create($request->all());
        return redirect()->route('alumnos.index')->with('exito', 'Alumno agregado correctamente');
    }

    // DETALLE - Mostrar uno
    public function show(Alumno $alumno){
        return view('alumnos.detalle', compact('alumno'));
    }

    // CAMBIO - Mostrar formulario editar
    public function edit(Alumno $alumno){
        return view('alumnos.editar', compact('alumno'));
    }

    // CAMBIO - Actualizar en BD
    public function update(Request $request, Alumno $alumno){
        $request->validate([
            'Num_Control' => 'required|unique:alumnos,Num_Control,'.$alumno->id,
            'Nombre'      => 'required',
            'Primer_ap'   => 'required',
            'Segundo_Ap'  => 'required',
            'Fecha_Nac'   => 'required|date',
            'Semestre'    => 'required|integer',
            'Carrera'     => 'required',
        ]);
        $alumno->update($request->all());
        return redirect()->route('alumnos.index')->with('exito', 'Alumno actualizado correctamente');
    }

    // BAJA - Eliminar de BD
    public function destroy(Alumno $alumno){
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('exito', 'Alumno eliminado correctamente');
    }
}
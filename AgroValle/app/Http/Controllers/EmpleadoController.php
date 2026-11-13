<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    public const CARGOS = [
        'Ingeniero Agrónomo',
        'Asesor Técnico de Campo',
        'Jefe de Bodega Central',
        'Operador de Maquinaria',
        'Cajero',
    ];

    private function reglas(?int $id = null): array
    {
        return [
            'identidad' => ['required', 'digits:13', Rule::unique('empleados', 'identidad')->ignore($id)],
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'correo' => ['nullable', 'email', 'max:255'],
            'cargo' => ['required', Rule::in(self::CARGOS)],
            'salario' => ['required', 'numeric', 'gt:0', 'max:99999999.99'],
            'fecha_ingreso' => ['required', 'date', 'before_or_equal:today'],
            'estado' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    private function mensajes(): array
    {
        return [
            'identidad.digits' => 'La identidad debe tener exactamente 13 dígitos, sin guiones.',
            'identidad.unique' => 'Esta identidad ya está registrada.',
            'salario.gt' => 'El salario debe ser mayor a 0.',
            'fecha_ingreso.date' => 'Ingresa una fecha de ingreso válida.',
            'fecha_ingreso.before_or_equal' => 'La fecha de ingreso no puede ser futura.',
            'cargo.required' => 'El cargo es obligatorio.',
            'cargo.in' => 'Selecciona un cargo válido.',
        ];
    }

    public function index()
    {
        $empleados = Empleado::orderBy('apellido')->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        Empleado::create($request->validate($this->reglas(), $this->mensajes()));

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->validate($this->reglas($empleado->id), $this->mensajes()));

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    private function reglas(?int $id = null): array
    {
        return [
            'rtn' => ['required', 'digits:14', Rule::unique('proveedores', 'rtn')->ignore($id)],
            'empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:8', 'regex:/^[2389]/'],
            'categoria' => ['required', Rule::in(['Químicos', 'Semilleros', 'Maquinaria'])],
            'limite_credito' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'dias_credito' => ['required', Rule::in([15, 30, 45, 60])],
            'estado' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    private function mensajes(): array
    {
        return [
            'rtn.digits' => 'El RTN debe tener exactamente 14 dígitos numéricos.',
            'rtn.unique' => 'Este RTN ya está registrado.',
            'telefono.digits' => 'El teléfono debe tener exactamente 8 dígitos.',
            'telefono.regex' => 'El teléfono debe iniciar con 2, 3, 8 o 9.',
            'limite_credito.min' => 'El límite de crédito no puede ser negativo.',
            'dias_credito.in' => 'Los días de crédito deben ser 15, 30, 45 o 60.',
        ];
    }

    public function index()
    {
        $proveedores = Proveedor::orderBy('empresa')->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes());
        $datos['fecha_registro'] = now()->toDateString();

        Proveedor::create($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate($this->reglas($proveedor->id), $this->mensajes());

        $proveedor->update($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
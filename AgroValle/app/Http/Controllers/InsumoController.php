<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class InsumoController extends Controller
{
    public const CATEGORIAS = [
        'Fertilizantes',
        'Semillas Certificadas',
        'Agroquímicos',
        'Herramientas',
        'Sistemas de Riego',
    ];

    private function reglas(?int $id = null): array
    {
        return [
            'codigo' => ['required', 'string', 'max:50', Rule::unique('insumos', 'codigo')->ignore($id)],
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['required', Rule::in(self::CATEGORIAS)],
            'precio' => ['required', 'numeric', 'gt:0', 'max:99999999.99'],
            'costo' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'inventario' => ['required', 'integer', 'min:0'],
            'fabricante' => ['required', 'string', 'max:255'],
            'fecha_vencimiento' => ['nullable', 'date'],
            'numero_lote' => ['nullable', 'string', 'max:50'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }

    private function mensajes(): array
    {
        return [
            'codigo.unique' => 'Este código (SKU) ya está registrado.',
            'precio.gt' => 'El precio debe ser mayor a 0.',
            'costo.min' => 'El costo no puede ser negativo.',
            'inventario.min' => 'El inventario no puede ser negativo.',
            'inventario.integer' => 'El inventario debe ser un número entero.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser jpg, png o webp.',
            'imagen.max' => 'La imagen no puede pesar más de 5MB.',
        ];
    }

    private function guardarImagen($archivo): string
    {
        $nombre = Str::uuid() . '.' . $archivo->getClientOriginalExtension();
        $archivo->move(public_path('uploads/insumos'), $nombre);
        return $nombre;
    }

    private function borrarImagen(?string $nombre): void
    {
        if ($nombre) {
            File::delete(public_path('uploads/insumos/' . $nombre));
        }
    }

    public function index(Request $request)
    {
        $buscar = trim($request->query('buscar', ''));

        $insumos = Insumo::query()
            ->when($buscar !== '', function ($q) use ($buscar) {
                $q->where(function ($sub) use ($buscar) {
                    $sub->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('codigo', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString();

        return view('insumos.index', compact('insumos', 'buscar'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes());

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $this->guardarImagen($request->file('imagen'));
        }
        $datos['fecha_registro'] = now()->toDateString();

        Insumo::create($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo registrado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $datos = $request->validate($this->reglas($insumo->id), $this->mensajes());

        if ($request->hasFile('imagen')) {
            $this->borrarImagen($insumo->imagen);
            $datos['imagen'] = $this->guardarImagen($request->file('imagen'));
        } else {
            unset($datos['imagen']);
        }

        $insumo->update($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        $this->borrarImagen($insumo->imagen);
        $insumo->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo eliminado correctamente.');
    }
}
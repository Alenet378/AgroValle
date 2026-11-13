@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
    @php
        $colores = [
            'Ingeniero Agrónomo' => 'success',
            'Asesor Técnico de Campo' => 'primary',
            'Jefe de Bodega Central' => 'warning text-dark',
            'Operador de Maquinaria' => 'info text-dark',
            'Cajero' => 'secondary',
        ];
    @endphp

    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
        <h1 class="mb-0">Nómina y Personal</h1>
        <a href="{{ route('empleados.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Nuevo empleado
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Identidad</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th class="text-end">Salario</th>
                        <th>Ingreso</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $e)
                        <tr>
                            <td>{{ $e->identidad }}</td>
                            <td>{{ $e->nombre }} {{ $e->apellido }}</td>
                            <td>{{ $e->correo ?? '—' }}</td>
                            <td><span class="badge bg-{{ $colores[$e->cargo] ?? 'secondary' }}">{{ $e->cargo }}</span></td>
                            <td class="text-end">L. {{ number_format($e->salario, 2, '.', ',') }}</td>
                            <td>{{ $e->fecha_ingreso->format('d/m/Y') }}</td>
                            <td>
                                @if ($e->estado === 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('empleados.edit', $e) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $e) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Eliminar a {{ $e->nombre }} {{ $e->apellido }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-muted py-4">No hay empleados registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $empleados->links() }}
        </div>
    </div>
@endsection
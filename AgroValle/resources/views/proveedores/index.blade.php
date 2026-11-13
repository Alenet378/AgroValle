@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
        <h1 class="mb-0">Fabricantes y Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Nuevo proveedor
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Plazo</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $p)
                        <tr>
                            <td>{{ $p->rtn }}</td>
                            <td>{{ $p->empresa }}</td>
                            <td>{{ $p->contacto }}</td>
                            <td>{{ $p->telefono }}</td>
                            <td>{{ $p->categoria }}</td>
                            <td><span class="badge bg-info text-dark">{{ $p->dias_credito }} días</span></td>
                            <td>
                                @if ($p->estado === 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('proveedores.edit', $p) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('proveedores.destroy', $p) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Eliminar a {{ $p->empresa }}? Esta acción no se puede deshacer.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-muted py-4">No hay proveedores registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $proveedores->links() }}
        </div>
    </div>
@endsection
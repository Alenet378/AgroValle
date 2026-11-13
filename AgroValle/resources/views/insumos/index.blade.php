@extends('layouts.app')

@section('title', 'Insumos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
        <h1 class="mb-0">Catálogo e Inventario de Insumos</h1>
        <a href="{{ route('insumos.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Nuevo insumo
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="GET" action="{{ route('insumos.index') }}" class="row g-2 mb-3">
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <input type="text" name="buscar" value="{{ $buscar }}" class="form-control"
                               placeholder="Buscar por nombre o SKU...">
                        <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
                        @if ($buscar !== '')
                            <a href="{{ route('insumos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                        @endif
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th class="text-end">Precio</th>
                            <th class="text-center">Existencias</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($insumos as $i)
                            <tr>
                                <td>
                                    @if ($i->imagen)
                                        <img src="{{ asset('uploads/insumos/' . $i->imagen) }}" alt="{{ $i->nombre }}"
                                             class="rounded" style="width:50px; height:50px; object-fit:cover;">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-content-center text-muted"
                                             style="width:50px; height:50px;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $i->codigo }}</td>
                                <td>
                                    {{ $i->nombre }}
                                    <div class="small text-muted">{{ $i->fabricante }}</div>
                                </td>
                                <td>{{ $i->categoria }}</td>
                                <td class="text-end">L. {{ number_format($i->precio, 2, '.', ',') }}</td>
                                <td class="text-center">
                                    @if ($i->inventario > 20)
                                        <span class="badge bg-success">{{ $i->inventario }} · Óptimo</span>
                                    @elseif ($i->inventario >= 10)
                                        <span class="badge bg-warning text-dark">{{ $i->inventario }} · Moderado</span>
                                    @else
                                        <span class="badge bg-danger">{{ $i->inventario }} · ¡Desabastecimiento!</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('insumos.edit', $i) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('insumos.destroy', $i) }}" method="POST" class="d-inline form-eliminar"
                                          data-nombre="{{ $i->nombre }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No se encontraron insumos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $insumos->links() }}
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.form-eliminar').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const nombre = form.dataset.nombre;
            if (!confirm('¿Seguro que deseas eliminar "' + nombre + '"? Esta acción no se puede deshacer.')) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush
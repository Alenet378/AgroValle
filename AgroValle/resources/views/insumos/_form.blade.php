<div class="row g-3">
    <div class="col-md-4">
        <label for="codigo" class="form-label">Código (SKU)</label>
        <input type="text" id="codigo" name="codigo"
               class="form-control @error('codigo') is-invalid @enderror"
               value="{{ old('codigo', $insumo->codigo ?? '') }}">
        @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               value="{{ old('nombre', $insumo->nombre ?? '') }}">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="categoria" class="form-label">Categoría</label>
        <select id="categoria" name="categoria" class="form-select @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Http\Controllers\InsumoController::CATEGORIAS as $cat)
                <option value="{{ $cat }}" @selected(old('categoria', $insumo->categoria ?? '') === $cat)>{{ $cat }}</option>
            @endforeach
        </select>
        @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="fabricante" class="form-label">Fabricante</label>
        <input type="text" id="fabricante" name="fabricante"
               class="form-control @error('fabricante') is-invalid @enderror"
               value="{{ old('fabricante', $insumo->fabricante ?? '') }}">
        @error('fabricante') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="precio" class="form-label">Precio (L.)</label>
        <input type="number" step="0.01" min="0.01" id="precio" name="precio"
               class="form-control @error('precio') is-invalid @enderror"
               value="{{ old('precio', $insumo->precio ?? '') }}">
        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="costo" class="form-label">Costo (L.)</label>
        <input type="number" step="0.01" min="0" id="costo" name="costo"
               class="form-control @error('costo') is-invalid @enderror"
               value="{{ old('costo', $insumo->costo ?? '') }}">
        @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="inventario" class="form-label">Inventario (unidades)</label>
        <input type="number" step="1" min="0" id="inventario" name="inventario"
               class="form-control @error('inventario') is-invalid @enderror"
               value="{{ old('inventario', $insumo->inventario ?? '') }}">
        @error('inventario') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="numero_lote" class="form-label">Número de lote <small class="text-muted">(opcional)</small></label>
        <input type="text" id="numero_lote" name="numero_lote"
               class="form-control @error('numero_lote') is-invalid @enderror"
               value="{{ old('numero_lote', $insumo->numero_lote ?? '') }}">
        @error('numero_lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento <small class="text-muted">(opcional)</small></label>
        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento"
               class="form-control @error('fecha_vencimiento') is-invalid @enderror"
               value="{{ old('fecha_vencimiento', isset($insumo) ? $insumo->fecha_vencimiento?->format('Y-m-d') : '') }}">
        @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="imagen" class="form-label">Foto del empaque <small class="text-muted">(jpg, png, webp, máx. 5MB)</small></label>
        <input type="file" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp"
               class="form-control @error('imagen') is-invalid @enderror">
        @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror

        @if (isset($insumo) && $insumo->imagen)
            <div class="mt-2">
                <small class="text-muted d-block">Imagen actual (se conserva si no subes otra):</small>
                <img src="{{ asset('uploads/insumos/' . $insumo->imagen) }}" alt="{{ $insumo->nombre }}"
                     class="img-thumbnail" style="max-height: 120px;">
            </div>
        @endif
    </div>
</div>
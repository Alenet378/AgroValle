@php
    $categorias = ['Químicos', 'Semilleros', 'Maquinaria'];
    $dias = [15, 30, 45, 60];
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label for="rtn" class="form-label">RTN (14 dígitos)</label>
        <input type="text" id="rtn" name="rtn" maxlength="14"
               class="form-control @error('rtn') is-invalid @enderror"
               value="{{ old('rtn', $proveedor->rtn ?? '') }}">
        @error('rtn') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="empresa" class="form-label">Empresa (razón social)</label>
        <input type="text" id="empresa" name="empresa"
               class="form-control @error('empresa') is-invalid @enderror"
               value="{{ old('empresa', $proveedor->empresa ?? '') }}">
        @error('empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="contacto" class="form-label">Contacto (asesor comercial)</label>
        <input type="text" id="contacto" name="contacto"
               class="form-control @error('contacto') is-invalid @enderror"
               value="{{ old('contacto', $proveedor->contacto ?? '') }}">
        @error('contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono (8 dígitos)</label>
        <input type="text" id="telefono" name="telefono" maxlength="8"
               class="form-control @error('telefono') is-invalid @enderror"
               value="{{ old('telefono', $proveedor->telefono ?? '') }}">
        @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="categoria" class="form-label">Categoría</label>
        <select id="categoria" name="categoria"
                class="form-select @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($categorias as $cat)
                <option value="{{ $cat }}" @selected(old('categoria', $proveedor->categoria ?? '') === $cat)>{{ $cat }}</option>
            @endforeach
        </select>
        @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="limite_credito" class="form-label">Límite de crédito (L.)</label>
        <input type="number" step="0.01" min="0" id="limite_credito" name="limite_credito"
               class="form-control @error('limite_credito') is-invalid @enderror"
               value="{{ old('limite_credito', $proveedor->limite_credito ?? '') }}">
        @error('limite_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="dias_credito" class="form-label">Días de crédito</label>
        <select id="dias_credito" name="dias_credito"
                class="form-select @error('dias_credito') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($dias as $d)
                <option value="{{ $d }}" @selected((int) old('dias_credito', $proveedor->dias_credito ?? 0) === $d)>{{ $d }} días</option>
            @endforeach
        </select>
        @error('dias_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado"
                class="form-select @error('estado') is-invalid @enderror">
            @foreach (['Activo', 'Inactivo'] as $est)
                <option value="{{ $est }}" @selected(old('estado', $proveedor->estado ?? 'Activo') === $est)>{{ $est }}</option>
            @endforeach
        </select>
        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
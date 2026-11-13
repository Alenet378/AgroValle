<div class="row g-3">
    <div class="col-md-6">
        <label for="identidad" class="form-label">Identidad / DNI (13 dígitos, sin guiones)</label>
        <input type="text" id="identidad" name="identidad" maxlength="13"
               class="form-control @error('identidad') is-invalid @enderror"
               value="{{ old('identidad', $empleado->identidad ?? '') }}">
        @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" id="correo" name="correo"
               class="form-control @error('correo') is-invalid @enderror"
               value="{{ old('correo', $empleado->correo ?? '') }}">
        @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               value="{{ old('nombre', $empleado->nombre ?? '') }}">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido"
               class="form-control @error('apellido') is-invalid @enderror"
               value="{{ old('apellido', $empleado->apellido ?? '') }}">
        @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="cargo" class="form-label">Cargo</label>
        <select id="cargo" name="cargo" class="form-select @error('cargo') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach (\App\Http\Controllers\EmpleadoController::CARGOS as $c)
                <option value="{{ $c }}" @selected(old('cargo', $empleado->cargo ?? '') === $c)>{{ $c }}</option>
            @endforeach
        </select>
        @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="salario" class="form-label">Salario base mensual (L.)</label>
        <input type="number" step="0.01" min="0.01" id="salario" name="salario"
               class="form-control @error('salario') is-invalid @enderror"
               value="{{ old('salario', $empleado->salario ?? '') }}">
        @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso"
               class="form-control @error('fecha_ingreso') is-invalid @enderror"
               value="{{ old('fecha_ingreso', isset($empleado) ? $empleado->fecha_ingreso->format('Y-m-d') : '') }}">
        @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-select @error('estado') is-invalid @enderror">
            @foreach (['Activo', 'Inactivo'] as $est)
                <option value="{{ $est }}" @selected(old('estado', $empleado->estado ?? 'Activo') === $est)>{{ $est }}</option>
            @endforeach
        </select>
        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
@extends('layouts.app')

@section('title', 'Editar empleado')

@section('content')
    <h1 class="mt-2 mb-4">Editar empleado</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('empleados.update', $empleado) }}">
                @csrf
                @method('PUT')
                @include('empleados._form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
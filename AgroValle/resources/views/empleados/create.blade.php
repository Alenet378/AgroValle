@extends('layouts.app')

@section('title', 'Nuevo empleado')

@section('content')
    <h1 class="mt-2 mb-4">Nuevo empleado</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('empleados.store') }}">
                @csrf
                @include('empleados._form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
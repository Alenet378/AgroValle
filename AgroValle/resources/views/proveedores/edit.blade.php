@extends('layouts.app')

@section('title', 'Editar proveedor')

@section('content')
    <h1 class="mt-2 mb-4">Editar proveedor</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('proveedores.update', $proveedor) }}">
                @csrf
                @method('PUT')
                @include('proveedores._form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
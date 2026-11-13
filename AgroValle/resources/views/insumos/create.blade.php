@extends('layouts.app')

@section('title', 'Nuevo insumo')

@section('content')
    <h1 class="mt-2 mb-4">Nuevo insumo</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('insumos.store') }}" enctype="multipart/form-data">
                @csrf
                @include('insumos._form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
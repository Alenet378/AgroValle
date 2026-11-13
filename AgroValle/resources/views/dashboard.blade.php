@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-2 mb-1">Dashboard Gerencial</h1>
    <p class="text-muted mb-4">Resumen general de AGROVALLE Honduras.</p>

    <div class="row g-4">
        <div class="col-md-6 col-xl-3">
            <div class="card kpi-card h-100" style="--kpi-color:#198754">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-muted fw-semibold">Insumos en catálogo</div>
                        <div class="fs-2 fw-bold">{{ number_format($totalInsumos) }}</div>
                    </div>
                    <div class="kpi-icon"><i class="bi bi-box-seam"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card kpi-card h-100" style="--kpi-color:#0d6efd">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-muted fw-semibold">Proveedores activos</div>
                        <div class="fs-2 fw-bold">{{ number_format($proveedoresActivos) }}</div>
                    </div>
                    <div class="kpi-icon"><i class="bi bi-truck"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card kpi-card h-100" style="--kpi-color:#fd7e14">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-muted fw-semibold">Empleados en nómina</div>
                        <div class="fs-2 fw-bold">{{ number_format($totalEmpleados) }}</div>
                    </div>
                    <div class="kpi-icon"><i class="bi bi-people"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card kpi-card h-100" style="--kpi-color:#6f42c1">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-muted fw-semibold">Valor del inventario</div>
                        <div class="fs-4 fw-bold">L. {{ number_format($valorInventario, 2, '.', ',') }}</div>
                    </div>
                    <div class="kpi-icon"><i class="bi bi-cash-stack"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
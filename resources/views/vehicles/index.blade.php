@section('crumb', 'Vehicle')
@section('crumb1', 'Dashboard')
@extends('layouts.layout')

@section('sidebar')
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboardUser') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bx bxs-car"></i>
                    <span>Vehicle</span>
                </a>
            </li><!-- End Presensi Nav -->
        </ul>
    </aside><!-- End Sidebar-->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Daftar Kendaraan</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('exportVehicle')}}" type="button" class="btn btn-warning text-small-on-mobile mx-3">Export</a>
                    <a href="{{ route('vehicles.create') }}" type="button" class="btn btn-primary text-small-on-mobile">
                        <i class="bi bi-plus me-1 text-small-on-mobile"></i> Add
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <form method="get" action="/search">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Table with stripped rows -->
            @include('vehicles.tabel', $vehicles)
            <!-- End Table with stripped rows -->
        </div>
    </div>
@endsection

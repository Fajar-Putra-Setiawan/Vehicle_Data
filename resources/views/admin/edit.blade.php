@extends('layouts.layout')
@section('crumb', 'Tambah User')
@section('crumb1', 'Dashboard')

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('vehicles.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users.index') }}">
                    <i class="bi bi-people"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('vehiclesAdmin.index') }}">
                    <i class="bx bxs-car"></i>
                    <span>Vehicle</span>
                </a>
            </li>

        </ul>

    </aside>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah User</h5>

            <!-- General Form Elements -->
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control" value="{{$users->email}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

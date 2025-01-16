@section('crumb', 'User')
@section('crumb1', 'Dashboard')
@extends('layouts.layout')

@section('sidebar')
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-people"></i>
                    <span>User</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('vehiclesAdmin.index')}}">
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
                    <h5 class="card-title">Daftar User</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('users.create') }}" type="button" class="btn btn-primary text-small-on-mobile">
                        <i class="bi bi-plus me-1 text-small-on-mobile"></i> Add
                    </a>
                </div>
            </div>


            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td><a href="{{route('users.edit', $user->id)}}" type="button" class="btn btn-warning">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

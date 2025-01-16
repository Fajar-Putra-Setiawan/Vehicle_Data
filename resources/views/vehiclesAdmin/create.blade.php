@extends('layouts.layout')
@section('crumb', 'Tambah Kendaraan')
@section('crumb1', 'Dashboard')

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
                <a class="nav-link collapsed" href="{{route('users.index')}}">
                    <i class="bi bi-people"></i>
                    <span>User</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link" href="{{route('vehiclesAdmin.index')}}">
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
            <h5 class="card-title">Form Tambah Catatan Kendaraan</h5>

            <!-- General Form Elements -->
            <form action="{{ route('vehiclesAdmin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nomor Plat</label>
                    <input type="text" name="license_plate" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Merk Mobil</label>
                    <input type="text" name="car_merk" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kerusakan</label>
                    <input type="text" name="damage_details" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Total Harga</label>
                    <input type="text" name="total_price" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <label for="uploadImage" class="col-sm-2 col-form-label">Unggah Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="uploadImage" name="vehicle_photo" accept="image/*">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Catatan Khusus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="special_notes">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="entry_date">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection

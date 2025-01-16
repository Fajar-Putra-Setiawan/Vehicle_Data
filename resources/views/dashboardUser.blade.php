@extends('layouts.layout')

@section('sidebar')
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('vehicles.index')}}">
                    <i class="bx bxs-car"></i>
                    <span>Vehicle</span>
                </a>
            </li><!-- End Presensi Nav -->
        </ul>
    </aside><!-- End Sidebar-->
@endsection

<main id="main" class="main">
  <section class="section dashboard">
    <div class="row">
    <!-- Placeholder Charts -->
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tutorial Pemakaian</h5>
            <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>1. Tekan Tombol Add Untuk Menambahkan Data</strong>
                <span class="badge bg-primary rounded-pill">1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>2. Masukan Setiap Data Yang Dibutuhkan Kedalam Form, Gambar & Catatan Khusus (Optional)</strong>
                <span class="badge bg-success rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>3. Tekan Tombol Submit Untuk Menambahkan Data</strong>
                <span class="badge bg-danger rounded-pill">3</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>4. Apabila Data Salah, Mohon Hapus dan Input Kembali</strong>
                <span class="badge bg-info rounded-pill">4</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>5. Jangan Lupa Di Log Out</strong>
                <span class="badge bg-warning rounded-pill">5</span>
            </li>
            </ul>
        </div>
        </div>
    </div>

    </div>
  </section>
</main><!-- End #main -->


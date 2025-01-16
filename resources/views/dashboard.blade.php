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
                <a class="nav-link collapsed" href="{{route('users.index')}}">
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

<main id="main" class="main">
  <section class="section dashboard">
    <div class="row">

      <!-- Statistics Cards -->
      <div class="col-lg-3 col-md-6">
        <div class="card info-card shadow">
          <div class="card-body">
            <h5 class="card-title">Total Users</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-primary d-flex align-items-center justify-content-center">
                <i class="bi bi-people text-white"></i>
              </div>
              <div class="ps-3">
                <h6>{{$totalUsers}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Statistics Card -->

      <div class="col-lg-3 col-md-6">
        <div class="card info-card shadow">
          <div class="card-body">
            <h5 class="card-title">Vehicles</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-success d-flex align-items-center justify-content-center">
                <i class="bx bxs-car text-white"></i>
              </div>
              <div class="ps-3">
                <h6>{{$totalVehicles}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Statistics Card -->

      <div class="col-lg-3 col-md-6">
        <div class="card info-card shadow">
          <div class="card-body">
            <h5 class="card-title">Pending Requests</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-warning d-flex align-items-center justify-content-center">
                <i class="bi bi-hourglass-split text-white"></i>
              </div>
              <div class="ps-3">
                <h6>0</h6>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Statistics Card -->

      <div class="col-lg-3 col-md-6">
        <div class="card info-card shadow">
          <div class="card-body">
            <h5 class="card-title">Messages</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-danger d-flex align-items-center justify-content-center">
                <i class="bi bi-chat-left-text text-white"></i>
              </div>
              <div class="ps-3">
                <h6>0</h6>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Statistics Card -->

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




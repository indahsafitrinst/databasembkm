@extends('template.layouttempdsn')
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="dashboarddsn" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Permohonan Program MBKM</span>
      </a>
      <a href="konversinilaikhs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Konversi Nilai Kartu Hasil Studi</span>
      </a>
      <a href="mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-people-fill me-3"></i>
        <span>Mahasiswa Dibimbing</span>
      </a>
      <a href="dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Dokumen Dikirim</span>
      </a>
      <a href="/daftarmhsmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-table me-3"></i>
        <span>Daftar Mahasiswa MBKM</span>
      </a>
      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-megaphone me-3"></i>
        <span>Daftar Pengumuman</span>
      </a>
    </div>
  </div>
</nav>
@endsection
@section('navbar')
<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
  <div class="container-fluid">
    <i id="navbtn" onclick="openNav()" class="openbtn bi bi-list"></i>
    <a class="navbar-brand ms-3" href="#">
      <img src="img/hehe.jfif" alt="" width="30" height="30">
      <span><strong>Portal MBKM</strong></span>
      <span><small>Dosen</small></span>
    </a>
    <a class="nav-link tombolnavbar" href="#">Tentang Aplikasi</a>
    <a class="nav-link tombolnavbar" href="#"><i class="bi bi-megaphone-fill me-2"></i>Buat Pengumuman</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav navbar-nav-scroll ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu notifscroll  dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-primary" href="#">Tampilkan semua notifikasi</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown d-flex flex-row justify-content-end">
          <a class="nav-link dropdown-toggle" href="#"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="img/hehe.jfif" alt="" width="30" height="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="/profildsn">
                <i class="bi bi-person-badge me-2"></i>Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="/logout">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection
@section('maincontent')
<div class="container-fluid">
  <!-- Title -->
  <div class="pt-2">
    <span class="h1">Profil</span>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <img src="#" class="rounded" style="width:200px; height: 200px;">
          </div>
          <div class="col">
            <p><span class="fw-bold">Nama : </span>{{session('nama_dosen')}}</p>
            <p><span class="fw-bold">NIP : </span>{{session('nip')}}</p>
            <p>
              <span class="fw-bold">Jabatan : </span>
              @if(session('level')==1)
                Ketua Program Studi
              @elseif(session('level')==2)
                Pegawai Program Studi
              @elseif(session('level')==3)
                Dosen
              @endif
              </p>
            <p><span class="fw-bold">Email : </span>{{session('email')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection
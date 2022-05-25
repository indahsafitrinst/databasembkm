@extends ('template.layouttemp')
@section('title')
<title>MBKM</title>
@endsection
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="khs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Kartu Hasil Studi</span>
      </a>
      <a href="krs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Kartu Rencana Studi</span>
      </a>
      <a href="merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-award-fill me-3"></i>
        <span>Merdeka Belajar</span>
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
      <span><small>Mahasiswa</small></span>
    </a>
    <a class="nav-link tombolnavbar" href="#">Tentang Aplikasi</a>
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
              <a class="dropdown-item" href="profil">
                <i class="bi bi-person-badge me-2"></i>Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="#">
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
  <div class="">
    <span class="h1">Merdeka Belajar Kampus Merdeka</span>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Pengumuman MBKM</p>
          </div>
          <div class="card-body">
            <p class="text-secondary">Belum ada pengumuman</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Program MBKM yang kamu ikuti</p>
          </div>
          <div class="card-body">
            <p class="text-secondary">Kamu belum ada mengikuti MBKM.</p>
            <p class="text-secondary">Untuk mengikuti program MBKM, sediakan :<br>
              1. Bukti Kelulusan dari mitra MBKM (format pdf)<br><br>
              2. Silabus atau program MBKM lengkap dengan topik, waktu dan Capaian pembelajaran (format pdf)<br><br>
              3. Dokumen Konversi SKS (format excel)<br>
            </p>
            <a href="pengajuanmbkm">
              <button class="btn btn-warning"><i class="bi bi-chat-left-text me-2"></i>Kirim Dokumen</button>
            </a>
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

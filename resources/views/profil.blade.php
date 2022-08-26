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
      <a href="/dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="/khs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Kartu Hasil Studi</span>
      </a>
      <a href="/krs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Kartu Rencana Studi</span>
      </a>
      <a href="/merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-award-fill me-3"></i>
        <span>Merdeka Belajar</span>
      </a>
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
            <p><span class="fw-bold">Nama : </span>{{session('nama')}}</p>
            <p><span class="fw-bold">NIM : </span>{{session('nim')}}</p>
            <p><span class="fw-bold">Fakultaasds : </span>Ilmu Komputer dan Tekologi Informasi</p>
            <p><span class="fw-bold">Jurusan : </span>{{session('nama_prodi')}}</p>
            <p><span class="fw-bold">Stambuk : </span>{{session('stambuk')}}</p>
            <p><span class="fw-bold">Semester : </span>3(Ganjil) T.A 2023/2024</p>
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

@extends('template.layouttempdsn')
@section('navbar')
<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
  <div class="container-fluid">
    <i id="navbtn" onclick="openNav()" class="openbtn bi bi-list"></i>
    <a class="navbar-brand ms-3" href="#">
      <img src="{{asset('/img/hehe.jfif')}}" alt="" width="30" height="30">
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
            <img class="rounded-circle" src="{{asset('/img/hehe.jfif')}}" alt="" width="30" height="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="#">
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
  <div class="">
    <span class="h1">Daftar Mitra</span>
  </div>
  <div class="container-fluid bg-info py-5 mt-5">
    <div class="row justify-content-center">
    <div class="row mb-6">
      <div class="col">
        <div class="card">
          <div class="card-body">
            @if(session('alert'))
            <p class="text-danger">
              {{session('alert')}}
            </p>
            @endif
            @foreach($tbl_mitra as $m)
                <form action="/mitra/update" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                <div class="form-group">
                  <input type="hidden" class="form-control" name="kode_mitralama" value="{{ $m->kode_mitra }}" placeholder="Masukkan Kode Mitra" required>
                  <div class="invalid-feedback">Harus masukkan Kode Mitra</div>
                </div>
                <div class="form-group">
                  <label for="kode_mitra" class="form-label">Kode Mitra</label>
                  <input type="text" class="form-control" name="kode_mitra" value="{{ $m->kode_mitra }}" placeholder="Masukkan Kode Mitra" required>
                  <div class="invalid-feedback">Harus masukkan Kode Mitra</div>
                </div>
                <div class="form-group">
                  <label for="nama_mitra" class="form-label">Nama Mitra</label>
                  <input type="text" class="form-control" name="nama_mitra" value="{{ $m->nama_mitra }}" placeholder="Masukkan Nama Mitra" required>
                  <div class="invalid-feedback">Harus masukkan Nama Mitra</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button class="btn btn-warning" value="Go Back"><a href="/mitra" style="color:white"> Kembali </a></button>   
                </div>
            </form>
            @endforeach
	
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
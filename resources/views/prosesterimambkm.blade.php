@extends('template.layouttempdsn')
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="/dashboarddsn" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="/permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Permohonan Program MBKM</span>
      </a>
      <a href="/konversinilaikhs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Konversi Nilai Kartu Hasil Studi</span>
      </a>
      <a href="/mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-people-fill me-3"></i>
        <span>Mahasiswa Dibimbing</span>
      </a>
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
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
    <a href="/permohonanmbkm" class="text-decoration-none">
      <button class="btn btn-outline-primary mb-3">
        <i class="bi bi-arrow-bar-left me-2 h3"></i>
      </button>
    </a>
    <span class="h1">Permohonan MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Proses Permohonan MBKM</p>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NAMA : </span>
                  INSERT NAMA
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NIM : </span>
                  1234567891
                </p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">DOSEN PEMBIMBING AKADEMIK : </span>
                  INSERT NAMA
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NIP PA : </span>
                  1234567891
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <p><span class="fw-bold">DOKUMEN: </span></p>
                <div class="d-flex">
                  <div class="pe-5">
                    <p>
                      <span>Bukti Kelulusan : </span>
                      <a href="#">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Silabus : </span>
                      <a href="#">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Konversi KRS : </span>
                      <a href="#">
                        <button class="btn btn-outline-success"><i class="bi bi-file-spreadsheet-fill me-2"></i> Download</button>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <form class="needs-validation" novalidate>
                  <div class="row mb-3">
                    <div class="col-sm">
                      <label for="docacckonvkrs" class="form-label">Dokumen konversi KRS dari dosen : </label>
                      <input class="form-control" type="file" id="docacckonvkrs" required>
                      <div class="invalid-feedback">
                        Harus memasukkan file konversi KRS sebelum menerima.
                      </div>
                    </div>
                    <div class="col-sm">
                      <label for="mitra" class="form-label">Mitra : </label>
                      <select class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <div class="invalid-feedback">
                        Harus memilih mitra sesuai dengan dokumen bukti kelulusan dan silabus.
                      </div>
                    </div>
                    <div class="col-sm">
                      <label for="program" class="form-label">Program : </label>
                      <select class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <div class="invalid-feedback">
                        Harus memilih Program.
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm">
                      <button type="button" class="btn btn-danger">Batal</button>
                      <button type="submit" class="btn btn-primary"><i class="bi bi-check2-circle me-2"></i>Terima Permohonan MBKM</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LANJUT DISINI BUAT MODAL KONFIRMASINYA CET -->
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
@endsection

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
      <a href="mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
    <span class="h1">Mahasiswa yang dibimbing</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Daftar Mahasiswa MBKM yang dibimbing</p>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th width="20px">No.</th>
                <th width="120px">NIM</th>
                <th width="200px">NAMA</th>
                <th width="200px">FAKULTAS</th>
                <th width="75px">SEMESTER</th>
                <th wdith="250px">PROGRAM MBKM</th>
                <th width="250px">MITRA</th>
                <th width="100px">STATUS</th>
                <th width="50px">AKSI</th>
              </tr>
              <tr class="rowclickable">
                <td>1</td>
                <td>1234567891</td>
                <td>jdshfjsd wieeugwg</td>
                <td>FGsdgsh Jsfh Dan Sa4yedfw</td>
                <td>2Ganjil</td>
                <td>MY ASSS IS THICC</td>
                <td>MY BALLS IS BIG</td>
                <td>Sedang menjalani perkuliahan</td>
                  <td class="text-center">
                    <a class="btn btn-outline-success" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proses"><i class="bi bi-arrow-right-circle-fill"></i></a>
                    <a class="btn btn-outline-secondary" href="/mhsdibimbing/mhs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"><i class="bi bi-three-dots"></i></a>
                    <span data-bs-toggle="modal"
                    data-bs-target="#modalhapus"
                    dataid="ID MHS MBKM DISINI"
                    datanamamhs="NAMA MHS DISINI">
                      <button class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="bi bi-trash3"></i></button>
                    </span>
                  </td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL HAPUS PERMINTAAN KONV NILAI -->
<div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus permohonan konversi nilai khs ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="inputid" type="text" id="inputid" value="">
          <p id="namamhs" class=""></p>
          <p class="text-danger">
            (Data yang telah dihapus tidak akan kembali lagi.
            Jika mahasiswa ingin mengikuti program mbkm, mahasiswa harus memasukan kembali dokumen-dokumen dari awal.)
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var exampleModal = document.getElementById('modalhapus')
  exampleModal.addEventListener('show.bs.modal', function (event) {

  var button = event.relatedTarget
  //ambil data dari buttonv
  var dataid = button.getAttribute('dataid')
  var namamhs = button.getAttribute('datanamamhs')
  //masukin ke form di modal
  var areainput = document.getElementById("inputid")
  areainput.value = dataid
  //masukin sebgai teks biasa
  var areanama = document.getElementById("namamhs");
  areanama.innerHTML = "Apakah anda yakin ingin menghapus data MBKM milik : " +
                          namamhs + "?";

  })
</script>
@endsection

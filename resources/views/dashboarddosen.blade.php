@extends('template.layouttempdsn')
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="/dashboarddsn" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="/daftarmhsmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-table me-3"></i>
        <span>Daftar Mahasiswa MBKM</span>
      </a>
      <a href="/permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
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

      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-megaphone me-3"></i>
        <span>Daftar Pengumuman</span>
      </a>
      <a href="daftarkrsmahasiswa" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Daftar KRS Mahasiswa</span>
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
    <a class="nav-link tombolnavbar" href="/daftarkrsmahasiswa"><i class="bi bi-person-lines-fill me-2"></i>Daftar KRS</a>
    <a class="nav-link tombolnavbar" href="/daftarkhsmahasiswa"><i class="bi bi-postcard me-2"></i>Daftar KHS</a>
    <a class="nav-link tombolnavbar" href="/buatpengumuman"><i class="bi bi-megaphone-fill me-2"></i>Buat Pengumuman</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav navbar-nav-scroll ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
            @if($newnotif>0)
            <span class="badge rounded-pill badge-notification bg-danger">{{$newnotif}}</span>
            @endif
          </a>
          <ul class="dropdown-menu notifscroll  dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            @foreach ($notifcatch as $notifcatch)
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  @if ($notifcatch->status==1)
                  <div class="card-body">
                    <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                  </div>
                  @else
                  <div class="card-body bg-secondary">
                    <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                  </div>
                  @endif
                </div>
              </a>
            </li>
            @endforeach
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
              <a class="dropdown-item" href="/profil">
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
  <div class="">
    <span class="h1">Dashboard</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="card">
      <div class="card-header">
        <p class="h3">Pengumuman</p>
      </div>
      <div class="card-body">
        @foreach($datapengmmn as $datapengmmn)
        <div class="row mb-3">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <span class="me-auto">
                    <a href="/pengumumantampil/{{$datapengmmn->id_pengumuman}}" class="h5 text-decoration-none text-dark">
                      {{$datapengmmn->judul}}
                    </a>
                    <span>- {{$datapengmmn->nama_dosen}}</span>
                  </span>
                  <span class="text-secondary me-3"><small>{{$datapengmmn->waktu}}</small></span>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      @if(session('nip')==$datapengmmn->nip_penulis)
                      <li>
                        <a class="dropdown-item" href="/daftarpengumuman/edit/{{$datapengmmn->id_pengumuman}}">Edit</a>
                      </li>
                      <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalhapus"
                        dataid="{{$datapengmmn->id_pengumuman}}"
                        datajudul="{{$datapengmmn->judul}}">
                            Hapus
                        </button>
                      </li>
                      @elseif(session('level') < 3)
                      <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalhapus"
                        dataid="{{$datapengmmn->id_pengumuman}}"
                        datajudul="{{$datapengmmn->judul}}">
                            Hapus
                        </button>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body" id="isipengumuman">
                {{strip_tags($datapengmmn->isi_pengumuman)}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

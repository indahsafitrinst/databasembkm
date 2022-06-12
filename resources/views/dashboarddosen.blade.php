@extends('template.layouttempdsn')
@section('sidebar')
@if(session('level')==2)
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
      <a href="/mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-people-fill me-3"></i>
        <span>Mahasiswa Dibimbing</span>
      </a>
      <a href="/permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Permohonan Program MBKM</span>
      </a>
      <a href="/konversinilaikhs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Konversi Nilai Kartu Hasil Studi</span>
      </a>
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Dokumen Dikirim</span>
      </a>
    </div>
  </div>
</nav>
@elseif(session('level')==1)
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
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Dokumen Dikirim</span>
      </a>
      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-megaphone me-3"></i>
        <span>Daftar Pengumuman</span>
      </a>
      <a href="/mitra" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Daftar Mitra</span>
      </a>
    </div>
  </div>
</nav>
@endif
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
                  @if(session('level')==1)
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
                      @elseif(session('level')==1)
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
                      @endif
                    </ul>
                  </div>
                  @endif
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

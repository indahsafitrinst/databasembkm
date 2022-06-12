@extends('template.layouttempdsn')
@section('sidebar')
@if(session('level')==2)
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
      <a href="/dashboarddsn" class="list-group-item list-group-item-action my-2 py-2 ripple">
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
      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
    <span class="h1">Pengumuman</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="card">
      <div class="card-header">
        <p class="h3">Daftar Pengumuman</p>
      </div>
      <div class="card-body">
        <form action="/daftarpengumuman/search" method="get">
          <div class="mb-3">
            <div class="d-flex flex-row">
              <input name="searchinput" type="text" class="form-control me-2" placeholder="Search NIM/Nama...">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </form>
        @if(isset($cek1))
        <p id="cek" class="p-2 bg-success bg-opacity-50">{{$cek1}}</p>
        @elseif(isset($cek2))
        <p id="cek" class="p-2 bg-danger bg-opacity-50">{{$cek2}}</p>
        @endif

        @foreach($datapengumuman as $datapengumuman)
        <div class="row mb-3">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <span class="me-auto">
                    <a href="/pengumumantampil/{{$datapengumuman->id_pengumuman}}" class="h5 text-decoration-none text-dark">
                      {{$datapengumuman->judul}}
                    </a>
                    <span>- {{$datapengumuman->nama_dosen}}</span>
                  </span>
                  <span class="text-secondary me-3"><small>{{$datapengumuman->waktu}}</small></span>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      @if(session('nip')==$datapengumuman->nip_penulis)
                      <li>
                        <a class="dropdown-item" href="/daftarpengumuman/edit/{{$datapengumuman->id_pengumuman}}">Edit</a>
                      </li>
                      <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalhapus"
                        dataid="{{$datapengumuman->id_pengumuman}}"
                        datajudul="{{$datapengumuman->judul}}">
                            Hapus
                        </button>
                      </li>
                      @elseif(session('level') < 3)
                      <li>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalhapus"
                        dataid="{{$datapengumuman->id_pengumuman}}"
                        datajudul="{{$datapengumuman->judul}}">
                            Hapus
                        </button>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body" id="isipengumuman">
                {{strip_tags($datapengumuman->isi_pengumuman)}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- HERE -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/hapuspengumuman" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="idpengumuman" hidden class="inputid" type="text" id="inputid" value="">
          <p id="jdlpengumuman" class=""></p>
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
  var judul = button.getAttribute('datajudul')
  //masukin ke form di modal
  var areainput = document.getElementById("inputid")
  areainput.value = dataid
  //masukin sebgai teks biasa
  var areajudul = document.getElementById("jdlpengumuman");
  areajudul.innerHTML = "Apakah anda yakin ingin menghapus Pengumuman dengan judul : " +
                          judul + "?";

  });
  $("#isipengumuman").text(function(index, currentText) {
    return currentText.substr(0, 190)+"...";
  });
  $("#cek").show().delay(3000).fadeOut('slow', function(){
    window.location.replace("/daftarpengumuman");
  });
</script>
@endsection

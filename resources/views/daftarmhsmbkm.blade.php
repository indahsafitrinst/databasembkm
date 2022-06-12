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
      <a href="/daftarmhsmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
    <span class="h1">Mahasiswa MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <div class="card-header">
            <p class="h3">
              Daftar Mahasiswa MBKM
            </p>
          </div>
          <div class="card-body">
            <form action="/daftarmhsmbkm/search" method="get">
              <div class="mb-3">
                <div class="d-flex flex-row">
                  <input name="searchinput" type="text" class="form-control me-2" placeholder="Search NIM/Nama...">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </form>
            <table class="table table-bordered">
              <tr>
                <th width="20px">No.</th>
                <th width="">NIM</th>
                <th width="">NAMA</th>
                <th width="">PROGRAM STUDI</th>
                <th width="">SEMESTER</th>
                <th wdith="">PROGRAM MBKM</th>
                <th width="">MITRA</th>
                <th width="">STATUS</th>
                <th width="50px">AKSI</th>
              </tr>
              @foreach($mhsmbkms as $mhsmbkm)
              <tr class="rowclickable">
                <td>1</td>
                <td>{{$mhsmbkm->nim}}</td>
                <td>{{$mhsmbkm->nama}}</td>
                <td>{{$mhsmbkm->nama_prodi}}</td>
                <td>{{$mhsmbkm->semester_perm}}</td>
                <td>{{$mhsmbkm->nama_program}}</td>
                <td>{{$mhsmbkm->nama_mitra}}</td>
                @if($mhsmbkm->statusmbkm==1)
                <td><p class="bg-success bg-opacity-50">Sedang menjalani perkuliahan</p></td>
                @elseif($mhsmbkm->statusmbkm==2)
                <td><p class="bg-warning bg-opacity-50">Menunggu konversi nilai</p></td>
                @elseif($mhsmbkm->statusmbkm==3)
                <td><p class="bg-primary bg-opacity-50">Telah menyelesaikan program MBKM</p></td>
                @endif
                <td class="text-center">
                  <a class="btn btn-outline-secondary mb-1" href="/mhsmbkm/{{$mhsmbkm->semester_perm}}/{{$mhsmbkm->nim}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"><i class="bi bi-three-dots"></i></a>
                  <span data-bs-toggle="modal"
                  data-bs-target="#modalhapus"
                  dataid="{{$mhsmbkm->id_mhsmbkm}}"
                  datanamamhs="{{$mhsmbkm->nama}}">
                    <button class="btn btn-danger mb-1" data-tooltip="tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
                      <i class="bi bi-trash3"></i>
                    </button>
                  </span>
                </td>
              </tr>
              @endforeach
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
      <form action="/hapusmhsmbkm" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus permohonan konversi nilai khs ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="idmhsmbkm" class="inputid" type="text" id="inputid" value="">
          <p id="namamhs" class=""></p>
          <p class="text-danger">(Data yang telah dihapus tidak bisa diakses lagi.
            Jika mahasiswa ingin mengikuti program mbkm, mahasiswa harus memasukan kembali dokumen-dokumen dari awal.)</p>
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
  areanama.innerHTML = "Apakah anda yakin ingin menghapus semua data MBKM terkait milik : " +
                          namamhs + "?";

  });
</script>
@endsection

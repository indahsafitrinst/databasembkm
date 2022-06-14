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
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
    <span class="h1">Dokumen Penerimaan Konversi KRS</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-body">
            @if(isset($cek))
            <p id="cek" class="p-2 bg-success bg-opacity-50">{{$cek}}</p>
            @elseif(isset($cek2))
            <p id="cek" class="p-2 bg-warning bg-opacity-50">{{$cek2}}</p>
            @endif
            <form action="/dkmndikirim/search" method="get">
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
                <th width="250px">JENIS DOKUMEN</th>
                <th width="120px">NIM PENERIMA</th>
                <th width="350px">NAMA MAHASISWA MBKM</th>
                <th width="350px">NAMA MITRA</th>
                <th width="350px">NAMA PROGRAM</th>
                <th wdith="200px">WAKTU DIUPLOAD</th>
                <th width="50px">Dokumen</th>
              </tr>
              <?php $i = 0;?>
              @foreach($docsdikirim as $datadocs)
              <tr class="rowclickable">
                <td><?php echo ++$i;?></td>
                <td>Konversi KRS</td>
                <td>{{$datadocs->nim}}</td>
                <td>{{$datadocs->nama}}</td>
                <td>{{$datadocs->nama_mitra}}</td>
                <td>{{$datadocs->nama_program}}</td>
                <td>
                  <small class="text-secondary">
                    {{$datadocs->waktu_unggah}}
                  </small>
                </td>
                <td class="text-center">
                  <a href="{{$datadocs->lokasi_filekonvkrsditerima}}" class="btn btn-primary m-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                  </a>
                  <span data-bs-toggle="modal"
                  data-bs-target="#modalhapus"
                  dataid="{{$datadocs->id_docsterimakrs}}"
                  datanamamhs="{{$datadocs->nama}}">
                    <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
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
      <form method="POST" action="/hapusdocsterimakrs">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus permohonan konversi nilai khs ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="iddocs" class="inputid" type="text" id="inputid" value="">
          <p id="namamhs" class=""></p>
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
  areanama.innerHTML = "Apakah anda yakin ingin menghapus permohonan konversi nilai milik : " +
                          namamhs + "?";

  });
  $("#cek").show().delay(2000).fadeOut('slow', function(){
    window.location.replace("/dkmndikirim");
  });
</script>
@endsection

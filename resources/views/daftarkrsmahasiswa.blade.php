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
    <span class="h1">KARTU RANCANGAN STUDI MAHASISWA</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">
              Daftar KRS Mahasiswa
            </p>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <div class="d-flex flex-row">
                  <input type="text" class="form-control me-2" placeholder="Search NIM/Nama...">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </form>
            {{--@if(isset($cek))
            <p id="cek" class="p-2 bg-success bg-opacity-75 text-white">{{$cek}}</p>
            @endif--}}


            <table class="table table-bordered">
              <tr>
                <th width="20px">No.</th>
                <th width="120px">NIM</th>
                <th width="250px">NAMA</th>
                <th width="250px">PROGRAM STUDI</th>
                <th width="200px">SEMESTER</th>
                <th width="100px">SKS</th>
                <th width="150px">DETAIL KRS</th>
              </tr>
             <?php $i = 0;?>
            @foreach($krs as $datakrs)
              <tr class="rowclickable">
                <td><?php echo ++$i;?></td>
                <td>{{$datakrs->nim}}</td>
                <td>{{$datakrs->nama}}</td>
                <td>{{$datakrs->nama_prodi}}</td>
                <td>{{$datakrs->semester}}</td>
                <td>{{$datakrs->sks_maks}}</td>
                <td>
                    <a href="daftarkrsmahasiswa/detailkrsmahasiswa/{{$datakrs->nim}}/{{$datakrs->semester}}"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye"></i>&nbsp;Lihat KRS</button></a>
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


<!-- MODAL HAPUS PERMOHONAN MBKM -->
<div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/hapuspermohonanmbkm" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Permohonan MBKM ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="idpermohonan" class="inputid" type="text" id="inputid" value="" hidden>
          <p id="namamhs" class=""></p>
          <p class="text-danger">(Mahasiswa harus memberikan lagi dokumen yang dibutuhkan untuk mengikuti MBKM kembali.)</p>
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
  areanama.innerHTML = "Apakah anda yakin ingin menghapus permohonan mbkm milik : " +
                          namamhs + "?";

  });
  $("#cek").show().delay(2000).fadeOut();

</script>
@endsection

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
    <a href="/konversinilaikhs" class="text-decoration-none">
      <button class="btn btn-outline-primary mb-3">
        <i class="bi bi-arrow-bar-left me-2 h3"></i>
      </button>
    </a>
    <span class="h1">Konversi Nilai</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Proses Konversi Nilai</p>
          </div>
          <div class="card-body">
            @if(isset($cek))
            <p id="cek" class="p-2 bg-success bg-opacity-50">{{$cek}}<br>
              Kembali ke daftar dalam 3 detik...
            </p>
            @elseif(isset($cek2))
            <p id="cek" class="p-2 bg-danger bg-opacity-50">{{$cek2}}}<br>
              Kembali de daftar dalam 3 detik...
            </p>
            @endif

            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NAMA : </span>
                  {{$datamhs->nama}}
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NIM : </span>
                  {{$datamhs->nim}}
                </p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">DOSEN PEMBIMBING AKADEMIK : </span>
                  {{$datamhs->nama_dosen}}
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NIP PA : </span>
                  {{$datamhs->nip_dosenpa}}
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
                      <a href="{{$datadocs->lokasi_filebuktilulus}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Silabus : </span>
                      <a href="{{$datadocs->lokasi_filesilabus}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Konversi KRS : </span>
                      <a href="{{$datadocs->lokasi_filekonvkrs}}">
                        <button class="btn btn-outline-success"><i class="bi bi-file-spreadsheet-fill me-2"></i>ingat ini  masih dari yang mhs  bukan dari dosen. Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Transkrip Nilai : </span>
                      <a href="{{$datadocs->lokasi_filekonvnilai}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p class="fw-bold">NILAI MATAKULIAH</p>
                <form class="" action="/inserttokhs" method="POST">
                  @csrf
                  @php
                    $i = 0
                  @endphp
                  @foreach($datakrs as $datakrs)
                  @php
                    $i++
                  @endphp
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label class="form-label" for="matkul1">{{$datakrs->nama_matakuliah}}: </label>
                    </div>
                    <div class="col-sm-4">
                      <input hidden name="matkul[{{$i}}]" id="matkul1" type="text" class="form-control" value="{{$datakrs->kode_matakuliah}}">
                      <input name="score[{{$i}}][]" id="matkul1" type="text" class="form-control" value="">
                    </div>
                  </div>
                  @endforeach
                  <input type="text" name="idmbkm" hidden value="{{$datadocs->id_mhsmbkm}}">

                  <div class="mb-3 row">
                    <div class="col-sm">
                      <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-forward me-2"></i>Konversi Nilai</button>
                        <a href="/konversinilaikhs" class="btn btn-danger me-auto">Batal</a>
                      </div>
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
  })();

  $("#cek").show().delay(3000).fadeOut('slow', function(){
    window.location.replace("/konversinilaikhs");
  });
</script>
@endsection

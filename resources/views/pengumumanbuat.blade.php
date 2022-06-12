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
  <div class=""><span class="h1">Buat Pengumuman</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="card">
      <div class="card-body">
        @if(isset($cek1))
        <p id="cek1" class="p-2 bg-success bg-opacity-50">{{$cek1}}</p>
        @elseif(isset($cek2))
        <p id="cek2" class="p-2 bg-danger bg-opacity-50">{{$cek2}}</p>
        @endif
        <form action="/tambahpengumuman" method="POST">
          @csrf
          <div class="mb-3">
            <label for="judulpengumuman" class="form-label">Judul : </label>
            <input name="judulpengumuman" id="judulpengumuman" type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label for="isipengumuman" class="form-label">Isi Pengumuman : </label>
            <textarea name="isipengumuman" class="form-control" id="isipengumuman"></textarea>
          </div>
          <div class="mb-3">
            <div class="d-flex flex-row-reverse">
              <button type="submit" class="btn btn-primary">Publikasi</button>
              <a href="/dashboarddsn" class="btn btn-secondary me-auto">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
            .create( document.querySelector( '#isipengumuman' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
<script>
  $("#cek1").show().delay(3000).fadeOut('slow', function(){
    window.location.replace("/daftarpengumuman");
  });
  $("#cek2").show().delay(3000).fadeOut('slow', function(){
    window.location.replace("/buatpengumuman");
  });
</script>
@endsection

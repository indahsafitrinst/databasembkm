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
  <!-- Title -->
  <div class="">
    <span class="h1">Kartu Hasil Studi Semester</span>
  </div>


  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card mb-2">
          <div class="card-body">
            <p><span class="fw-bold">NAMA</span> : {{$profils->nama}} </p>
            <p><span class="fw-bold">NIM</span> :  {{$profils->nim}}</p>
         </div>
        </div>
      </div>
      <div class="col">
        <table class="table table-striped table-bordered">
          <tr>
            <th>No.</th>
            <th style="width: 75px;">KODE MATAKULIAH</th>
            <th>MATA KULIAH</th>
            <th>SKS</th>
            <th>Nilai</th>
          </tr>
           <?php $i = 0;?>
           @foreach($khs as $khs)
          <tr>
            <td><?php echo ++$i;?></td>
            <td>{{$khs->kode_matakuliah}}</td>
            <td>{{$khs->nama_matakuliah}}</td>
            <td>{{$khs->sks}}</td>
            <td>{{$khs->nilai}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3">Total</td>
            <td>{{$sks->total}}</td>
          </tr>
          <tr>
            <td colspan="3">IP Semester</td>
            <td>{{$ip->ip_semester}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col d-flex justify-content-end">
      <button class="btn btn-secondary me-2"><i class="bi bi-printer me-2"></i>Print</button>
    </div>
  </div>
</div>
@endsection

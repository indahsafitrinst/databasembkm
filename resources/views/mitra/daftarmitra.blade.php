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
      <a href="/mitra" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
    <span class="h1">Daftar Mitra MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Daftar Mitra</p>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
          @elseif(session()-> has('error'))
          <div class="alert alert-danger">
              {{ session()->get('error') }}
          </div>
           @endif
          <div class="card-body">
            <div class="card-body">
              <form action="admin/mitra/search" method="get">
                <div class="mb-3">
                  <div class="d-flex flex-row">
                    <input name="searchinput" type="text" class="form-control me-2" placeholder="Search Kode Mitra/Nama Mitra...">
                    <button type="submit" class="btn btn-primary">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah">
                <i class="bi bi-plus-square"></i> <a href="{{ route('mitra.create') }}" style="color:white"> Tambah </a>
              </button>
            <table class="table table-bordered">
              <tr>
                <th width="20px">No.</th>
                <th width="250px">KODE MITRA</th>
                <th width="250px">NAMA MITRA</th>
                <th width="100px">AKSI</th>
              </tr>
              <?php
              $mitras = DB::table('tbl_mitra')->get();
              $no = 1;
              ?>
              @foreach($mitras as $mitra)
                <tr class="rowclickable">
                <td>{{$no++ }}</td>
                <td>{{$mitra->kode_mitra}}</td>
                <td>{{$mitra->nama_mitra}}</td>
                <td class="text-center">
                    <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><a href="/mitra/edit/{{ $mitra->kode_mitra }}" style="color:white"><i class="bi bi-pencil-square"></i></a>
                      </button>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mitra.destroy', $mitra->kode_mitra) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><a href="{{ route('mitra.destroy', $mitra->kode_mitra) }}" style="color:white;"><i class="bi bi-trash3"></i></a> </button>
                    </form>
                  </td>
                </td>
              </tr>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        <br/>
      </div>
    </div>
  </div>
</div>

<!-- MODAL HAPUS DAFTAR MITRA -->
<div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Mitra?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="inputid" type="text" id="inputid" value="">
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


@endsection

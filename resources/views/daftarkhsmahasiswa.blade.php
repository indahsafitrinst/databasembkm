@extends('template.layouttempdsn')
<script type="text/javascript">
function gotopage(selfval){
var value = selfval.options[selfval.selectedIndex].value;

window.location.href="/khs/mbkm/"+value;
}
</script>

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
    <span class="h1">KHS Mahasiswa MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">
              Daftar KHS Mahasiswa MBKM
            </p>
          </div>
          <div class="card-body">
            <form action="/daftarkhsmahasiswa/search" method="get">
              <div class="mb-3">
                <div class="d-flex flex-row">
                  <input name="searchinput" type="text" class="form-control me-2" placeholder="Search NIM/Nama...">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </form>



            <form>
              <div class="mb-3">
              <div class="d-flex flex-row">
              <label for="semselect" class="form-label h5">Pilih semester : </label>
              <select id="semesters" class="" onchange="gotopage(this)">
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
              </select>
              </div>
              </div>
            </form>


            <div class="d-flex flex-row">
            <table class="table table-bordered">
                  <tr>
                    <th width="20px">No.</th>
                    <th width="100px">NIM</th>
                    <th width="150px">NAMA</th>
                    <th width="200px">PROGRAM STUDI</th>
                    <th width="75px">SEMESTER</th>
                    <th width="75px">IP</th>
                    <th width="50px">AKSI</th>
                  </tr>
                  @foreach($khsmhsmbkms as $khsmhsmbkm)
                  <tr class="rowclickable">
                    <td>1</td>
                    <td>{{$khsmhsmbkm->nim}}</td>
                    <td>{{$khsmhsmbkm->nama}}</td>
                    <td>{{$khsmhsmbkm->nama_prodi}}</td>
                    <td>{{$khsmhsmbkm->semester}}</td>
                    <td>{{$khsmhsmbkm->ip_semester}}</td>
                    <td class="text-center">
                      <a class="btn btn-outline-secondary mb-1" href="/khsmhsmbkm/{{$khsmhsmbkm->semester}}/{{$khsmhsmbkm->nim}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"><i class="bi bi-three-dots"></i></a>
                        <button class="btn btn-outline-danger mb-1" data-tooltip="tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
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
</div>

@endsection

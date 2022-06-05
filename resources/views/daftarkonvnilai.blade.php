@extends('template.layouttempdsn')
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="dashboarddsn" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Permohonan Program MBKM</span>
      </a>
      <a href="konversinilaikhs" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Konversi Nilai Kartu Hasil Studi</span>
      </a>
      <a href="mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-people-fill me-3"></i>
        <span>Mahasiswa Dibimbing</span>
      </a>
      <a href="dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Dokumen Dikirim</span>
      </a>
      <a href="/daftarmhsmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-table me-3"></i>
        <span>Daftar Mahasiswa MBKM</span>
      </a>
      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-megaphone me-3"></i>
        <span>Daftar Pengumuman</span>
      </a>
    </div>
  </div>
</nav>
@endsection
@section('navbar')
<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
  <div class="container-fluid">
    <i id="navbtn" onclick="openNav()" class="openbtn bi bi-list"></i>
    <a class="navbar-brand ms-3" href="#">
      <img src="img/hehe.jfif" alt="" width="30" height="30">
      <span><strong>Portal MBKM</strong></span>
      <span><small>Dosen</small></span>
    </a>
    <a class="nav-link tombolnavbar" href="#">Tentang Aplikasi</a>
    <a class="nav-link tombolnavbar" href="#"><i class="bi bi-megaphone-fill me-2"></i>Buat Pengumuman</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav navbar-nav-scroll ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu notifscroll  dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">INI NOTIFIKASI</span>
                  </div>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-primary" href="#">Tampilkan semua notifikasi</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown d-flex flex-row justify-content-end">
          <a class="nav-link dropdown-toggle" href="#"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="img/hehe.jfif" alt="" width="30" height="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-person-badge me-2"></i>Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection
@section('maincontent')
<div class="container-fluid">
  <div class="">
    <span class="h1">Konversi Nilai</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Daftar Permintaan Konversi Nilai</p>
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
            @if(isset($cek))
            <p id="cek" class="p-2 bg-warning bg-opacity-50">{{$cek}}</p>
            @endif
            <table class="table table-bordered">
                <tr>
                  <th width="20px">No.</th>
                  <th width="120px">NIM</th>
                  <th width="250px">NAMA</th>
                  <th width="250px">PROGRAM STUDI</th>
                  <th width="200px">WAKTU UPLOAD</th>
                  <th width="100px">STATUS</th>
                  <th width="150px">AKSI</th>
                </tr>
                @foreach($datakonvnilai as $dataknilai)
                <tr class="rowclickable">
                  <td>1</td>
                  <td>{{$dataknilai->nim}}</td>
                  <td>{{$dataknilai->nama}}</td>
                  <td>{{$dataknilai->nama_prodi}}</td>
                  <td>{{$dataknilai->waktu_unggah}}</td>
                  <td>
                    @if($dataknilai->status == 1)
                    <span class="text-warning"><i class="bi bi-circle me-2"></i>Belum diperiksa</span>
                    @elseif($dataknilai->status == 2)
                    <span class="text-success"><i class="bi bi-check-circle me-2"></i>Telah diterima</span>
                    @elseif($dataknilai->status == 3)
                    <span class="text-danger"><i class="bi bi-dash-circle me-2"></i>Ditolak</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <a>
                      <button class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download Dokumen">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                      </button>
                    </a>
                    @if($dataknilai->status==1)
                    <!-- <a href="/konversinilaikhs/proses/{{$dataknilai->id_dokumen}}"> -->
                    <a href="/konversinilaikhs/proses/{{$dataknilai->id_mhsmbkm}}">
                      <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proses permintaan konversi nilai">
                        <i class="bi bi-caret-right-square-fill"></i>
                      </button>
                    </a>
                    <span data-bs-toggle="modal"
                    data-bs-target="#modaltolak"
                    dataid="{{$dataknilai->id_dokumen}}"
                    datanamamhs="{{$dataknilai->nama}}">
                      <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tolak konversi nilai">
                        <i class="bi bi-dash-circle"></i>
                      </button>
                    </span>
                    @elseif($dataknilai->status==2)
                    <a href="/mhsmbkm/{{$dataknilai->semester}}/{{$dataknilai->nim}}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Lihat data mahasiswa MBKM">
                      <i class="bi bi-display"></i>
                    </a>
                    @elseif($dataknilai->status==3)
                    <a href="/mhsmbkm/{{$dataknilai->semester}}/{{$dataknilai->nim}}" class="btn btn-success disabled" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="Lihat data mahasiswa MBKM">
                      <i class="bi bi-display"></i>
                    </a>
                    <span data-bs-toggle="modal"
                    data-bs-target="#modalhapus"
                    datahapusid="{{$dataknilai->id_dokumen}}"
                    datanamamhshapus="{{$dataknilai->nama}}">
                      <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus konversi nilai">
                        <i class="bi bi-trash3"></i></i>
                      </button>
                    </span>
                    @endif
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- MODAL TOLAK PERMINTAAN KONV NILAI -->
<div class="modal fade" id="modaltolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/tolakkonvnilai" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tolak permohonan konversi nilai khs ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="iddokumen" class="inputid" type="text" id="inputid" hidden value="">
          <p id="namamhs" class=""></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya, Tolak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- MODAL TOLAK END -->
<!-- MODAL HAPUS PERMINTAAN KONV NILAI -->
<div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/hapuskonvnilai" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus permohonan konversi nilai khs ini?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input name="iddokumen" class="" type="text" id="inputidhapus" hidden value="">
          <p id="namamhshapus" class=""></p>
          <p class="text-danger">(Jika menghapus permintaan konversi nilai ini, dokumen konversi nilai tidak akan kembali.)<p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- MODAL HAPUS END -->

<script>
  var exampleModal = document.getElementById('modaltolak')
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
  areanama.innerHTML = "Apakah anda yakin ingin menolak permohonan konversi nilai milik : " +
                          namamhs + "?";

  })

  var vhapusmodal = document.getElementById('modalhapus')
  vhapusmodal.addEventListener('show.bs.modal', function (event) {

  var button = event.relatedTarget
  //ambil data dari buttonv
  var datahapusid = button.getAttribute('datahapusid')
  var namamhshapus = button.getAttribute('datanamamhshapus')
  //masukin ke form di modal
  var areainput = document.getElementById("inputidhapus")
  areainput.value = datahapusid
  //masukin sebgai teks biasa
  var areanama = document.getElementById("namamhshapus");
  areanama.innerHTML = "Apakah anda yakin ingin menolak permohonan konversi nilai milik : " +
                          namamhshapus + "?";

  })
  $("#cek").show().delay(2000).fadeOut('slow', function(){
    window.location.replace("/konversinilaikhs");
  });

</script>
@endsection

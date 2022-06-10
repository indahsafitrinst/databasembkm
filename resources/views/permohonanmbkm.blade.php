@extends('template.layouttempdsn')
@section('sidebar')
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
      <a href="/permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Permohonan Program MBKM</span>
      </a>
      <a href="/konversinilaikhs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Konversi Nilai Kartu Hasil Studi</span>
      </a>
      <a href="/mhsdibimbing" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-people-fill me-3"></i>
        <span>Mahasiswa Dibimbing</span>
      </a>
      <a href="/dkmndikirim" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Dokumen Konversi KRS</span>
      </a>
      <a href="/daftarmhsmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-table me-3"></i>
        <span>Daftar Mahasiswa MBKM</span>
      </a>
      <a href="/daftarpengumuman" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-megaphone me-3"></i>
        <span>Daftar Pengumuman</span>
      </a>
      <a href="/daftarkrsmahasiswa" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-file-earmark-check me-3"></i>
        <span>Daftar KRS Mahasiswa</span>
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
    <a class="nav-link tombolnavbar" href="/buatpengumuman"><i class="bi bi-megaphone-fill me-2"></i>Buat Pengumuman</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav navbar-nav-scroll ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
            @if($newnotif>0)
            <span class="badge rounded-pill badge-notification bg-danger">{{$newnotif}}</span>
            @endif
          </a>
          <ul class="dropdown-menu notifscroll  dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            @foreach ($notifcatch as $notifcatch)
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  @if ($notifcatch->status==1)
                  <div class="card-body">
                    <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                  </div>
                  @else
                  <div class="card-body bg-secondary">
                    <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                  </div>
                  @endif
                </div>
              </a>
            </li>
            @endforeach
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
              <a class="dropdown-item" href="/profil">
                <i class="bi bi-person-badge me-2"></i>Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="/logout">
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
    <span class="h1">Permohonan MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">
              Daftar Permohonan MBKM
            </p>
          </div>
          <div class="card-body">
            <form action="/permohonanmbkm/search" method="get">
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


            <table class="table table-bordered">
              <tr>
                <th width="20px">No.</th>
                <th width="120px">NIM</th>
                <th width="250px">NAMA</th>
                <th width="150px">FAKULTAS</th>
                <th width="75px">SEMESTER</th>
                <th width="200px">WAKTU UPLOAD</th>
                <th width="100px">STATUS</th>
                <th width="150px">AKSI</th>
              </tr>
              <?php $i = 0;?>
              @foreach($permmbkm as $datapermmbkm)
              <tr class="rowclickable">
                <td><?php echo ++$i;?></td>
                <td>{{$datapermmbkm->nim_mhs}}</td>
                <td>{{$datapermmbkm->nama}}</td>
                <td>{{$datapermmbkm->nama_prodi}}</td>
                <td>{{$datapermmbkm->semester_perm}}</td>
                <td><small class="text-secondary">{{$datapermmbkm->waktu_unggah}}</small></td>
                <td>
                  @if($datapermmbkm->status == 1)
                  <span class="text-warning"><i class="bi bi-circle me-2"></i>Belum diperiksa</span>
                  @elseif($datapermmbkm->status == 2)
                  <span class="text-success"><i class="bi bi-check-circle me-2"></i>Telah diterima</span>
                  @elseif($datapermmbkm->status == 3)
                  <span class="text-danger"><i class="bi bi-dash-circle me-2"></i>Ditolak</span>
                  @endif

                </td>
                <td class="text-center">
                  <a href="#" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                  title="Download Dokumen">

                      <i class="bi bi-file-earmark-arrow-down"></i>
                    </button>
                  </a>
                  @if($datapermmbkm->status==1)
                  <a href="/permohonanmbkm/proses/{{$datapermmbkm->id_permohonan}}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Proses permintaan konversi nilai">
                    <i class="bi bi-caret-right-square-fill"></i>
                  </a>
                  <span data-bs-toggle="modal"
                  data-bs-target="#modalhapus"
                  dataid="{{$datapermmbkm->id_permohonan}}"
                  datanamamhs="{{$datapermmbkm->nama}}">
                    <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus dari daftar">
                      <i class="bi bi-trash3"></i></i>
                    </button>
                  </span>
                  @elseif($datapermmbkm->status==2)
                  <a href="/mhsmbkm/{{$datapermmbkm->semester_perm}}/{{$datapermmbkm->nim_mhs}}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Lihat data mahasiswa MBKM">
                    <i class="bi bi-display"></i>
                  </a>
                  @else
                  <a href="/mhsmbkm/{{$datapermmbkm->semester_perm}}/{{$datapermmbkm->nim_mhs}}" class="btn btn-success disabled" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Lihat data mahasiswa MBKM">
                    <i class="bi bi-display"></i>
                  </a>
                  <span data-bs-toggle="modal"
                  data-bs-target="#modalhapus"
                  dataid="{{$datapermmbkm->id_permohonan}}"
                  datanamamhs="{{$datapermmbkm->nama}}">
                    <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus dari daftar">
                      <i class="bi bi-trash3"></i></i>
                    </button>
                  </span>
                  @endif

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

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
      <a href="/permohonanmbkm" class="list-group-item list-group-item-action my-2 py-2 ripple">
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
      <a href="daftarkrsmahasiswa" class="list-group-item list-group-item-action my-2 py-2 ripple">
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
    <span class="h1">Mahasiswa MBKM</span>
  </div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Detail Mahasiswa</p>
          </div>
          <div class="card-body">
            @if(isset($cek1))
            <p id="cek" class="p-2 bg-success bg-opacity-50">{{$cek1}}</p>
            @elseif(isset($cek2))
            <p id="cek" class="p-2 bg-danger bg-opacity-50">{{$cek2}}</p>
            @endif


            @if(isset($datamhsmbkm))
            <div class="row mb-3">
              <div class="col-sm-6">
                <p>
                  <span class="fw-bold">NAMA : </span>
                  {{$datamhsmbkm->nama}}
                </p>
              </div>
              <div class="col-sm-3">
                <p>
                  <span class="fw-bold">NIM : </span>
                  {{$datamhsmbkm->nim}}
                </p>
              </div>
              <div class="col-sm-3">
                <p>
                  <span class="fw-bold">SEMESTER : </span>
                  {{$datamhsmbkm->semester}}
                </p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">DOSEN PEMBIMBING AKADEMIK : </span>
                  {{$datamhsmbkm->nim}}
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NIP PA : </span>
                  {{$datamhsmbkm->nim}}
                </p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm">
                <p>
                  <span class="fw-bold">MITRA : </span>
                  {{$datamhsmbkm->nama_mitra}}
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <span class="fw-bold">NAMA PROGRAM : </span>
                  {{$datamhsmbkm->nama_program}}
                </p>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <div class="col-sm">
                  <p>
                    <span class="fw-bold">STATUS MBKM : </span>
                    @if($datamhsmbkm->statusmbkm==1)
                    <span class="p-2" style="background-color: #b5ebbf;"><i class="bi bi-book-half me-2"></i>Menjalani Perkuliahan</span>
                    @elseif($datamhsmbkm->statusmbkm==2)
                    <span class="p-2" style="background-color: #e3eb94;"><i class="bi bi-hourglass-split me-2"></i>Menunggu penerimaan konversi nilai</span>
                    @elseif($datamhsmbkm->statusmbkm==3)
                    <span class="p-2" style="background-color: #749ef2;"><i class="bi bi-check-circle-fill me-2"></i>Telah selesai menjalani MBKM</span>
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <p><span class="fw-bold">DOKUMEN: </span></p>
                <div class="d-flex">
                  <div class="pe-5">
                    <p>
                      <span>Bukti Kelulusan : </span>
                      <a href="{{$datamhsmbkm->lokasi_filebuktilulus}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Silabus : </span>
                      <a href="{{$datamhsmbkm->lokasi_filesilabus}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  <div class="pe-5">
                    <p>
                      <span>Konversi KRS : </span>
                      <a href="{{$datamhsmbkm->lokasi_filekonvkrs}}">
                        <button class="btn btn-outline-success"><i class="bi bi-file-spreadsheet-fill me-2"></i>ingat ini masih dari mhs Download</button>
                      </a>
                    </p>
                  </div>
                  @if(isset($datatranskripnilai))
                  <div class="pe-5">
                    <p>
                      <span>Transkrip Nilai : </span>
                      <a href="{{$datatranskripnilai->lokasi_filekonvnilai}}">
                        <button class="btn btn-outline-danger"><i class="bi bi-filetype-pdf me-2"></i></i> Download</button>
                      </a>
                    </p>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <p><span class="fw-bold">AKSI : </span></p>
                <form method="POST" id="form-field" action="/hapusmhsmbkm">
                  @csrf
                  @if($datamhsmbkm->statusmbkm==2)
                  <a class="btn btn-outline-success" href="#"><i class="bi bi-arrow-right-circle-fill me-2"></i>Proses</a>
                  @endif
                  <input name="idmhsmbkm" type="text" hidden value="{{$datamhsmbkm->id_mhsmbkm}}" required>
                  <button id="submitbutton" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusmbkmmodal">
                    <i class="bi bi-trash3 me-2"></i>Hapus
                  </button>
                </form>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="hapusmbkmmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan Data MBKM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-danger bg-opacity-50">
        Yakin untuk menghapus data MBKM ini? (Dokumen-dokumen yang terhubung ke mahasiswa ini akan ditolak.<br>
        Mahasiswa ini harus mengirim kembali dokumen-dokumennya untuk mengikuti MBKM lagi.)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="sendhapus" class="btn btn-danger">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>


<script>
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var btnform = document.getElementById('submitbutton')
  var modalhapus = document.getElementById('hapusmbkmmodal')
  // Loop over them and prevent submission
  //ini memang harus btw... ga bisa dia klo ga ada  ( di awal fungsinya
  $('#submitbutton').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    $('#hapusmbkmmodal').modal('show');
  });
  $('#sendhapus').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    $('#form-field').submit();
  });

  $("#cek").show().delay(2000).fadeOut('slow', function(){
    window.location.replace("/daftarmhsmbkm");
  });
</script>
@endsection

@extends ('template.layouttemp')
@section('title')
<title>MBKM</title>
@endsection
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="/dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="/khs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Kartu Hasil Studi</span>
      </a>
      <a href="/krs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Kartu Rencana Studi</span>
      </a>
      <a href="/merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-award-fill me-3"></i>
        <span>Merdeka Belajar</span>
      </a>
    </div>
  </div>
</nav>
@endsection

@section('maincontent')
<div class="container-fluid">
  <!-- Title -->
  <div class="">
    <span class="h1">Merdeka Belajar Kampus Merdeka</span>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Pengumuman MBKM</p>
          </div>
          <div class="card-body">
            <p class="text-secondary">Belum ada pengumuman</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Program MBKM yang anda ikuti</p>
          </div>
          <div class="card-body">
            @if($statusmbkmmhs==0)
            <p class="text-secondary">Anda belum ada mengikuti MBKM.</p>
            <p class="text-secondary">Untuk mengikuti program MBKM, sediakan :<br>
              1. Bukti Kelulusan dari mitra MBKM (format pdf)<br><br>
              2. Silabus atau program MBKM lengkap dengan topik, waktu dan Capaian pembelajaran (format pdf)<br><br>
              3. Dokumen Konversi SKS (format excel)<br>
            </p>
            <a href="/merdekabelajar/pengajuanmbkm">
              <button class="btn btn-warning"><i class="bi bi-chat-left-text me-2"></i>Kirim Dokumen</button>
            </a>
            @elseif($statusmbkmmhs==1)
            <p class="text-secondary">
              Permohonan MBKM anda sedang diproses. Silahkan kembali beberapa saat lagi.
              Jika ada masalah terkait permohonan MBKM, silahkan hubungi +6242069696969 melalui ponsel atau WhatsApp.
            </p>
            @elseif($statusmbkmmhs==2)
            <p class="text-secondary">
              Permohonan MBKM anda telah diterima! Langkah selanjutnya adalah mengubah KRS anda sesuai dengan dokumen konversi KRS berikut.<br>
              <span class="text-danger">Ubah KRS sebelum 15 Agustus 2027 23:59:59!</span><br>
              Jika ada masalah terkait MBKM, silahkan hubungi +6242069696969 melalui ponsel atau WhatsApp.
            </p>
            <p class="text-secondary"></p>
            <a class="btn btn-warning" href="/merdekabelajar/pengajuankonvnilai">
              Ajukan Konversi Nilai
            </a>
            @elseif($statusmbkmmhs==3)
            <p class="text-secondary">
              Anda telah mengirim dokumen transkrip nilai. Permintaan konversi nilai anda sedang diproses. Silahkan kembali beberapa saat lagi.<br>
              Jika ada masalah terkait permohonan MBKM, silahkan hubungi +6242069696969 melalui ponsel atau WhatsApp.
            </p>
            @elseif($statusmbkmmhs==4)
            <p class="text-secondary">
              Konversi nilai telah diterima. Silahkan cek KHS anda.<br>
              Jika ada masalah terkait permohonan MBKM, silahkan hubungi +6242069696969 melalui ponsel atau WhatsApp.
            </p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection

@extends ('template.layouttemp')
@section('title')
<title>Dashboard</title>
@endsection
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="/dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
      <a href="/merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple">
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
    <span class="h1">Dashboard</span>
  </div>
  <!-- Title -->
  <!--konten-->
  <div class="container-fluid py-5 mt-3 bg-info">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Selamat datang di aplikasi Kampus Merdeka.</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col border">
                <p>Aplikasi kampus merdeka adalah Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Suspendisse diam lectus, consequat id rhoncus non, congue scelerisque sapien. Maecenas
                  efficitur suscipit egestas. Praesent odio tellus, volutpat sit amet sollicitudin et,
                  eleifend vel ligula. </p>
              </div>
              <div class="col">
                <p class="h5">Kamu memiliki 0 notifikasi.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">Pengumuman</p>
          </div>
          <div class="card-body">
            <p>Maaf, saat ini belum ada pengumuman.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--konten-->
</div>
@endsection

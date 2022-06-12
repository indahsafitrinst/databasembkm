<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="js/navbarjs.js"></script> -->
    <link href="/css/navbardsn.css" rel="stylesheet">
  </head>
  <body>
    @include('template.navbartemp')
    @yield('sidebar')
    <nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
      <div class="container-fluid">
        <i id="navbtn" onclick="openNav()" class="openbtn bi bi-list"></i>
        <a class="navbar-brand ms-3" href="#">
          <img src="img/hehe.jfif" alt="" width="30" height="30">
          <span><strong>Portal MBKM</strong></span>
          <span><small>Dosen</small></span>
        </a>
        <a class="nav-link tombolnavbar" href="#">Tentang Aplikasi</a>
        <a class="nav-link tombolnavbar" href="/daftarkrsmahasiswa"><i class="bi bi-person-lines-fill me-2"></i>Daftar KRS</a>
        <a class="nav-link tombolnavbar" href="/daftarkhsmahasiswa"><i class="bi bi-postcard me-2"></i>Daftar KHS</a>
        @if(session('level')==1)
        <a class="nav-link tombolnavbar" href="/buatpengumuman"><i class="bi bi-megaphone-fill me-2"></i>Buat Pengumuman</a>
        @endif
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
                      <div class="card-body">
                        <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                      </div>
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
    <div id="main" class="mainmargin">
    @yield('maincontent')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/navbarjsdsn.js"></script>
    <script src="https://www.jsdelivr.com/package/npm/pdfjs-dist"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>
  </body>
</html>

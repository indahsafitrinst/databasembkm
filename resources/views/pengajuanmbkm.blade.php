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
    <a href="/merdekabelajar" class="text-decoration-none">
      <button class="btn btn-outline-primary mb-3">
        <i class="bi bi-arrow-bar-left me-2 h3"></i>
      </button>
    </a>
    <span class="h1"><a href="merdekabelajar" class="link-dark text-decoration-none">Merdeka Belajar Kampus Merdeka</a></span>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header bg-secondary text-light">
            <p class="h3">Pengajuan Dokumen MBKM</p>
          </div>
          <div class="card-body">
            <p>Silahkan masukkan dokumen-dokumen sesuai dengan formnya.</p>
            <form class="needs-validation" novalidate method="post"  action="ajukanpermmbkm" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="buktilulus">Bukti kelulusan (.pdf) : </label>
                  <input name="buktilulus" id="buktilulus" class="form-control" type="file" required>
                  <div class="invalid-feedback">Harus ada dokumen bukti kelulusan.</div>
                </div>
                <div class="col">
                  <label class="form-label" for="silabus">Silabus (.pdf) : </label>
                  <input name="silabus" id="silabus" class="form-control" type="file" required>
                  <div class="invalid-feedback">Harus ada dokumen silabus.</div>
                </div>
                <div class="col">
                  <label class="form-label" for="konvkrs">Konversi KRS (.xlsx atau .xls): </label>
                  <input name="permohonankonvkrs" id="konvkrs" class="form-control" type="file" required>
                  <div class="invalid-feedback">Harus ada dokumen pengajuan konversi krs.</div>
                </div>
              </div>
              <div class="row">
                <div class="col d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill me-2"></i>Ajukan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>
  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection

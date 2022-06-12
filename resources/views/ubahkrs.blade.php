@extends ('template.layouttemp')
@section('title')
<title>Kartu Rencana Studi</title>
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
      <a href="/krs" class="list-group-item list-group-item-action my-2 py-2 ripple active">
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
  @if(session()->has('error'))
  <div class="alert alert-danger">
      {{ session()->get('error') }}
  </div>
  @elseif(session()->has('warning'))
  <div class="alert alert-danger">
      {{ session()->get('warning') }}
  </div>
  @elseif(session()->has('error2'))
  <div class="alert alert-danger">
      {{ session()->get('error2') }}
  </div>
  @endif
  <div id=msg></div>
  <div class="container-fluid bg-info py-3 mt-3">
    <div class="row mb-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <p class="h3">
              Daftar Matakuliah
            </p>
          </div>
          <div class="col">
          <div class="card-body">
            <form name="form1" class="" action="/update" method="get">
                {{ csrf_field() }}
            <table class="table table-bordered">
              <tr>
                <th>No.</th>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
              </tr>
              <?php $i=0; ?>
              <tr class="rowclickable">
                @foreach($matakuliah as $mk)
                <td><?php $i++ ?></td>
                <td>{{$mk->kode_matakuliah}}</td>
                <td>{{$mk->nama_matakuliah}}</td>
                <td>{{$mk->sks}}</td>
                <td><input type="checkbox" name="kode_matakuliah[]" value="{{$mk->kode_matakuliah}}"></td>
              </tr>
              @endforeach
            </table>
                <div class="col d-flex justify-content-end">
                  <input type="submit" name="kirim" value="Tambah" class="btn btn-success me-2">
                </div>
          </form>
                <div class="col d-flex justify-content-end">
                  <a href="/krs"><button class="btn btn-danger mt-2 me-2">Kembali</button></a>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- <script type="text/javascript">
function ceksks(j) {
var sum=0;
for(var i=0; i < document.form1.sks[i].length; i++){

if(document.form1.sks[i].checked){
sum = sum + parseInt(document.form1.sks[i].value);
}
document.getElementById("msg").innerHTML="Sum :"+ sum;

if(sum >10){
sum = sum - parseInt(document.form1.sks[j].value);
document.form1.sks[j].checked = false ;
alert("Sum of the selection can't be more than 10")
//return false;
}
document.getElementById("msg").innerHTML="Sum :"+ sum;
}
}
</script> -->
<!-- <script type="text/javascript">
function chkcontrol()
  var sum=0;
  for(var i=0;i<document.form1.sks.length;i++){
    if(document.form1.sks[i].checked){
      sum = sum + parseInt(document.form1.sks[i].value);
    }
    document.getElementById("msg").innerHTML="Sum :"+ sum;
  }

  if(sum>24){
    alert("Sum of the selection can't be more than 10")
  }

</script> -->
  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection

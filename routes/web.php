<?php

use App\Http\Controllers\DaftarKRSMahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\MerdekaBelajarController;
use App\Http\Controllers\PermohonanMBKMController;
use App\Http\Controllers\MahasiswaMBKMController;
use App\Http\Controllers\DaftarMhsMBKMController;
use App\Http\Controllers\KonversiNilaiController;


//controller 1

//controller 2

//controller 3

//controller 4

//controller 5


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/loginmhs',[LoginController::class,'logincekmhs']);
Route::get('/',[LoginController::class,'logincekmhs']);
Route::post("mhslogin",[LoginController::class,'mhslogin']);
Route::get('/logout',[LoginController::class,'logout']);

Route::group(['middleware'=>['protectedPage']],function(){
  Route::get('/dashboard', function () {
      return view('dashboardmhs');
  });
  Route::get('/profil', function () {
      return view('profil');
  });

  // Halaman khs mahasiswa
  Route::get('/khs', function () {
      return view('halkhs');
  });


  //End halaman khs mahasiswa
  // Halaman krsmahasiswa
  Route::get('/krs', function () {
      return view('halkrs');
  });


  //END Halaman Krs Mahasiswa

  Route::get('/merdekabelajar',[MerdekaBelajarController::class,'statusMBKMchecking']);
  Route::get('/merdekabelajar/pengajuanmbkm', function () {
      return view('pengajuanmbkm');
  });
  Route::post('/merdekabelajar/ajukanpermmbkm',[PengajuanController::class,'uploadPengajuan']);

  Route::get('/merdekabelajar/pengajuankonvnilai', function () {
      return view('pengajuankonvnilai');
  });
  Route::post('/merdekabelajar/ajukankonvnilai',[PengajuanController::class,'uploadPengajuanKonvNilai']);
  // UNTUK DOSEN DISINI

  Route::get('/profildsn', function () {
      return view('profildsn');
  });
});


//UNTUK DOSEN JUGA DISINI

Route::get('/logindosen',[LoginController::class,'logincekdsn']);
Route::post("dsnlogin",[LoginController::class,'dsnlogin']);

Route::get('/dashboarddsn', function () {
    return view('dashboarddosen');
});

Route::get('/permohonanmbkm', [PermohonanMBKMController::class,'tampilDataPermMBKM']);
Route::get('/permohonanmbkm/proses/{key_permmbkm}', [PermohonanMBKMController::class,'prosesPermMBKM']);
Route::post('/terimapermohonanmbkm', [PermohonanMBKMController::class,'terimaPermMBKM']);
Route::post('/hapuspermohonanmbkm', [PermohonanMBKMController::class,'hapusPermMBKM']);
Route::post('/tolakpermohonanmbkm', [PermohonanMBKMController::class,'tolakPermMBKM']);

Route::get('/mhsmbkm/{key_semester}/{key_nimmbkm}', [MahasiswaMBKMController::class,'tampilDataMhsMBKM']);


Route::get('/daftarmhsmbkm', [DaftarMhsMBKMController::class,'daftarMhsMBKM']);
Route::get('/hapusmhsmbkm', [MahasiswaMBKMController::class,'hapusDataMhsMBKM']);
Route::get('/daftarkrsmahasiswa', [DaftarKRSMahasiswa::class,'daftarKRSMahasiswa']);
Route::get('/daftarkrsmahasiswa/detailkrsmahasiswa/{id}/{semester}', [DaftarKRSMahasiswa::class,'detailKRSMahasiswa']);


// route daftar krs mahasiswwa
//Route::get('/daftarkrsmahasiswa', [DaftarKRSmahasiswaController::class,'tampilDaftarKRSmahasiswa']);
// selesai


Route::get('/konversinilaikhs', [KonversiNilaiController::class,'daftarKonvNilai']);
Route::get('/konversinilaikhs/proses/{key_idmhsmbkm}', [KonversiNilaiController::class,'prosesKonvNilai']);
Route::post('/tolakkonvnilai', [KonversiNilaiController::class,'tolakKonvNilai']);
Route::post('/hapuskonvnilai', [KonversiNilaiController::class,'hapusKonvNilai']);

Route::get('/mhsdibimbing', function () {
    return view('mhsdibimbing');
});


Route::get('/dkmndikirim', function () {
    return view('dkmndikirim');
});
Route::get('/dkmnall', function () {
    return view('dkmnall');
});

Route::get('/buatpengumuman', function () {
    return view('pengumumanbuat');
});
Route::get('/daftarpengumuman/edit', function () {
    return view('pengumumanedit');
});
Route::get('/daftarpengumuman', function () {
    return view('pengumumandaftar');
});
Route::get('/pengumumantampil', function () {
    return view('pengumumantampil');
});

Route::get('/testpage', function() {
  return view('testpage');
});
;

//DAFTAR KHS Mahasiswa

//END DAFTAR KHS MAHASISWA


//DAFTAR KRS Mahasiswa
// Route::get('/daftarkrsmahasiswa', function () {
//     return view('daftarkrsmahasiswa');
// });

//END DAFTAR KRS MAHASISWA


//DAFTAR MITRA

//END DAFTAR MITRA
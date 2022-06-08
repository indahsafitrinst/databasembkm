<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\MerdekaBelajarController;
use App\Http\Controllers\PermohonanMBKMController;
use App\Http\Controllers\MahasiswaMBKMController;
use App\Http\Controllers\DaftarMhsMBKMController;
use App\Http\Controllers\KonversiNilaiController;
use App\Http\Controllers\DokumenKirimController;
use App\Http\Controllers\MahasiswaDibimbingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;

//controller 1
use App\Http\Controllers\KrsController;
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
  Route::get('/krs',[KrsController::class,'tampilkanProfil']);

  Route::get('/krs/ubah/{nim}',[KrsController::class,'ubahkrs']);

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
  Route::get('/logindosen',[LoginController::class,'logincekdsn']);
  Route::post("dsnlogin",[LoginController::class,'dsnlogin']);

  Route::get('/dashboarddsn', [DashboardController::class,'dashboardDosen']);

  Route::get('/permohonanmbkm', [PermohonanMBKMController::class,'tampilDataPermMBKM']);
  Route::get('/permohonanmbkm/proses/{key_permmbkm}', [PermohonanMBKMController::class,'prosesPermMBKM']);
  Route::post('/terimapermohonanmbkm', [PermohonanMBKMController::class,'terimaPermMBKM']);
  Route::post('/hapuspermohonanmbkm', [PermohonanMBKMController::class,'hapusPermMBKM']);
  Route::post('/tolakpermohonanmbkm', [PermohonanMBKMController::class,'tolakPermMBKM']);

  Route::get('/mhsmbkm/{key_semester}/{key_nimmbkm}', [MahasiswaMBKMController::class,'tampilDataMhsMBKM']);
  Route::get('/daftarmhsmbkm', [DaftarMhsMBKMController::class,'daftarMhsMBKM']);
  Route::post('/hapusmhsmbkm', [MahasiswaMBKMController::class,'hapusDataMhsMBKM']);


  Route::get('/konversinilaikhs', [KonversiNilaiController::class,'daftarKonvNilai']);
  Route::get('/konversinilaikhs/proses/{key_idmhsmbkm}', [KonversiNilaiController::class,'prosesKonvNilai']);
  Route::post('/inserttokhs',[KonversiNilaiController::class,'insertToKhs']);
  Route::post('/tolakkonvnilai', [KonversiNilaiController::class,'tolakKonvNilai']);
  Route::post('/hapuskonvnilai', [KonversiNilaiController::class,'hapusKonvNilai']);

  Route::get('/mhsdibimbing', [MahasiswaDibimbingController::class,'daftarMhsDbmbng']);


  Route::get('/dkmndikirim', [DokumenKirimController::class,'getDocsTerkirim']);
  Route::post('/hapusdocsterimakrs', [DokumenKirimController::class,'hapusDocsTerimaKRS']);


  Route::post('/tambahpengumuman', [PengumumanController::class,'tambahPengumuman']);
  Route::get('/buatpengumuman', function () {
      return view('pengumumanbuat');
  });
  Route::get('/daftarpengumuman', [PengumumanController::class,'daftarPengumuman']);
  Route::get('/daftarpengumuman/edit/{key_idpengumuman}', [PengumumanController::class,'editPengumuman']);
  Route::post('/ubahpengumuman', [PengumumanController::class,'ubahPengumuman']);
  Route::post('/hapuspengumuman', [PengumumanController::class,'hapusPengumuman']);
  Route::get('/pengumumantampil/{key_idpengumuman}', [PengumumanController::class,'tampilPengumuman']);


});




Route::get('/testpage', function() {
  return view('testpage');
});

Route::get('/errodsnpage', function() {
  return view('errordsn');
});


//DAFTAR KHS Mahasiswa

//END DAFTAR KHS MAHASISWA


//DAFTAR KRS Mahasiswa

//END DAFTAR KRS MAHASISWA


//DAFTAR MITRA

//END DAFTAR MITRA

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
use App\Http\Controllers\DokumenKirimController;
use App\Http\Controllers\MahasiswaDibimbingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\DaftarKHSMhsController;
//controller 1
use App\Http\Controllers\KrsController;
//controller 2

//controller 3

//controller 4

//controller 5
use App\Http\Controllers\DaftarMitraController;

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
Route::get('/logindosen',[LoginController::class,'logincekdsn']);
Route::post("dsnlogin",[LoginController::class,'dsnlogin']);



Route::group(['middleware'=>['protectedPage']],function(){
  Route::get('/dashboard', function () {
      return view('dashboardmhs');
  });
  Route::get('/profil', function () {
      return view('profil');
  });

  // Halaman khs mahasiswa
  // Route::get('/khs', function () {
  //     return view('halkhs');
  // });

  // Route::get('/khsbaru', function () {
  //     return view('halkhsbaru');
  // });
  Route::get('/khs',[KhsController::class,'tampilkankhsMhs']);
  // Route::get('/khs/',[KhsController::class,'tampilkanKhs']);
  Route::get('/khs/{semester}',[KhsController::class,'tampilkanKhsSemester']);
  //End halaman khs mahasiswa
  // Halaman krsmahasiswa
  Route::get('/krs', function () {
      return view('halkrs');
  });
  Route::get('/krs',[KrsController::class,'tampilkanProfil']);

  Route::get('/krs/ubah/{nim}',[KrsController::class,'ubahkrs']);

  Route::get('/krs/hapus',[KrsController::class,'hapuskrs']);

  Route::get('/update',[KrsController::class,'update']);

  //END Halaman Krs Mahasiswa

  Route::get('/merdekabelajar',[MerdekaBelajarController::class,'statusMBKMchecking']);
  Route::get('/merdekabelajar/pengajuanmbkm', function () {
      return view('pengajuanmbkm');
  });
  Route::post('/merdekabelajar/ajukanpermmbkm',[PengajuanController::class,'uploadPengajuan']);

  Route::get('/merdekabelajar/pengajuankonvnilai', [PengajuanController::class,'dataHiddenKonvNilai']);
  Route::post('/merdekabelajar/ajukankonvnilai',[PengajuanController::class,'uploadPengajuanKonvNilai']);


  // UNTUK DOSEN DISINI




});




Route::get('/testpage', function() {
  return view('testpage');
});


Route::group(['middleware'=>['protectedDosenPage']],function(){
  Route::get('/profildsn', function () {
      return view('profildsn');
  });

  Route::get('/dashboarddsn', [DashboardController::class,'dashboardDosen']);

  Route::get('/permohonanmbkm', [PermohonanMBKMController::class,'tampilDataPermMBKM']);
  Route::get('/permohonanmbkm/proses/{key_permmbkm}', [PermohonanMBKMController::class,'prosesPermMBKM']);
  Route::post('/terimapermohonanmbkm', [PermohonanMBKMController::class,'terimaPermMBKM']);
  Route::post('/hapuspermohonanmbkm', [PermohonanMBKMController::class,'hapusPermMBKM']);
  Route::post('/tolakpermohonanmbkm', [PermohonanMBKMController::class,'tolakPermMBKM']);
  Route::get('/permohonanmbkm/search', [PermohonanMBKMController::class,'searchPermMBKM']);

  Route::get('/mhsmbkm/{key_semester}/{key_nimmbkm}', [MahasiswaMBKMController::class,'tampilDataMhsMBKM']);
  Route::get('/daftarmhsmbkm', [DaftarMhsMBKMController::class,'daftarMhsMBKM']);
  Route::post('/hapusmhsmbkm', [MahasiswaMBKMController::class,'hapusDataMhsMBKM']);


  Route::get('/konversinilaikhs', [KonversiNilaiController::class,'daftarKonvNilai']);
  Route::get('/konversinilaikhs/proses/{key_idmhsmbkm}', [KonversiNilaiController::class,'prosesKonvNilai']);
  Route::post('/inserttokhs',[KonversiNilaiController::class,'insertToKhs']);
  Route::post('/tolakkonvnilai', [KonversiNilaiController::class,'tolakKonvNilai']);
  Route::post('/hapuskonvnilai', [KonversiNilaiController::class,'hapusKonvNilai']);
  Route::get('/konversinilaikhs/search', [KonversiNilaiController::class,'searchKonvNilai']);

  Route::get('/mhsdibimbing', [MahasiswaDibimbingController::class,'daftarMhsDbmbng']);
  Route::get('/mhsdibimbing/search', [MahasiswaDibimbingController::class,'searchMhsDbmbng']);

  Route::get('/daftarmhsmbkm/search', [DaftarMhsMBKMController::class,'searchDaftarMhsMBKM'])->middleware('superiordsn');
  Route::get('/daftarmhsmbkm', [DaftarMhsMBKMController::class,'daftarMhsMBKM'])->middleware('superiordsn');
  Route::get('/hapusmhsmbkm', [MahasiswaMBKMController::class,'hapusDataMhsMBKM'])->middleware('superiordsn');
  Route::get('/daftarkrsmahasiswa', [DaftarKRSMahasiswa::class,'daftarKRSMahasiswa']);
  Route::get('/daftarkrsmahasiswa/detailkrsmahasiswa/{id}/{semester}', [DaftarKRSMahasiswa::class,'detailKRSMahasiswa']);


  // route daftar krs mahasiswwa
  //Route::get('/daftarkrsmahasiswa', [DaftarKRSmahasiswaController::class,'tampilDaftarKRSmahasiswa']);
  // selesai

  Route::get('/dkmndikirim', [DokumenKirimController::class,'getDocsTerkirim']);
  Route::get('/dkmndikirim/search', [DokumenKirimController::class,'searchDocsTerkirim']);
  Route::post('/hapusdocsterimakrs', [DokumenKirimController::class,'hapusDocsTerimaKRS']);

  Route::post('/tambahpengumuman', [PengumumanController::class,'tambahPengumuman'])->middleware('superiordsn');
  Route::get('/buatpengumuman', function () {
      return view('pengumumanbuat');
  })->middleware('superiordsn');
  Route::get('/daftarpengumuman', [PengumumanController::class,'daftarPengumuman'])->middleware('superiordsn');
  Route::get('/daftarpengumuman/edit/{key_idpengumuman}', [PengumumanController::class,'editPengumuman'])->middleware('superiordsn');
  Route::post('/ubahpengumuman', [PengumumanController::class,'ubahPengumuman'])->middleware('superiordsn');
  Route::post('/hapuspengumuman', [PengumumanController::class,'hapusPengumuman'])->middleware('superiordsn');
  Route::get('/pengumumantampil/{key_idpengumuman}', [PengumumanController::class,'tampilPengumuman']);
  Route::get('/daftarpengumuman/search', [PengumumanController::class,'searchPengumuman'])->middleware('superiordsn');

  Route::get('/errodsnpage', function() {
    return view('errordsn');
  });


  //DAFTAR KHS Mahasiswa
  Route::get('/daftarkhsmahasiswa', [DaftarKHSMhsController::class,'daftarKHSMhs']);
  Route::get('/khsmhsmbkm/{key_semester}/{key_nimmbkm}', [DaftarKHSMhsController::class,'tampilKhs']);
  Route::get('/khs/mbkm/{semester}',[DaftarKHSMhsController::class,'tampilKhsSemester']);
  Route::get('/daftarkhsmahasiswa/search', [DaftarKHSMhsController::class,'search']);
  //END DAFTAR KHS MAHASISWA


  //DAFTAR KRS Mahasiswa
  // Route::get('/daftarkrsmahasiswa', function () {
  //     return view('daftarkrsmahasiswa');
  // });

  //END DAFTAR KRS MAHASISWA


  //DAFTAR MITRA
  Route::resource('mitra', DaftarMitraController::class);
  Route::get('/mitra/edit/{kode_mitra}', [DaftarMitraController::class, 'edit']);
  Route::post('/mitra/update',[DaftarMitraController::class, 'update']);
  Route::get('/mitra/delete/{kode_mitra}',[DaftarMitraController::class, 'delete']);
  Route::get('admin/mitra/search', [DaftarMitraController::class,'searchMitra']);
  //END DAFTAR MITRA
});

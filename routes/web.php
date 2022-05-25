<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('loginmhs');
});
Route::get('/loginmhs', function () {
    return view('loginmhs');
});
Route::get('/logindosen', function () {
    return view('logindosen');
});
Route::get('/dashboard', function () {
    return view('dashboardmhs');
});
Route::get('/khs', function () {
    return view('halkhs');
});
Route::get('/krs', function () {
    return view('halkrs');
});
Route::get('/merdekabelajar', function () {
    return view('merdekabelajar');
});
Route::get('/pengajuanmbkm', function () {
    return view('pengajuanmbkm');
});
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/dashboarddsn', function () {
    return view('dashboarddosen');
});
Route::get('/permohonanmbkm', function () {
    return view('permohonanmbkm');
});
Route::get('/permohonanmbkmall', function () {
    return view('permohonanmbkmall');
});
Route::get('/permohonanmbkm/proses', function () {
    return view('prosesterimambkm');
});

Route::get('/konversinilaikhs', function () {
    return view('konversinilaikhs');
});
Route::get('/konversinilaikhs/proses', function () {
    return view('prosesterimakonvnilai');
});

Route::get('/mhsdibimbing', function () {
    return view('mhsdibimbing');
});
Route::get('/mhsdibimbing/mhs', function () {
    return view('detailmhsmbkm');
});

Route::get('/dkmndikirim', function () {
    return view('dkmndikirim');
});
Route::get('/dkmnall', function () {
    return view('dkmnall');
});

Route::get('/daftarmhsmbkm', function () {
    return view('daftarmhsmbkm');
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

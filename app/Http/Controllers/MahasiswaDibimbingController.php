<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MahasiswaDibimbingController extends Controller
{
  public function daftarMhsDbmbng(){

    if(session('level')==3){
      $getdata = DB::table('semua_mhs_mbkm')
                  ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                  ->where('nip_dosenpa',session('nip'))
                  ->get();
    }else{
      $getdata = DB::table('semua_mhs_mbkm')
                  ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                  ->get();
    }
    return view('mhsdibimbing', ['datamhsdbmbng'=>$getdata]);
  }



}

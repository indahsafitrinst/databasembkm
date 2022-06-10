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

  public function searchMhsDbmbng(Request $req){

    if(session('level')==3){
      $search = DB::table('semua_mhs_mbkm')
                ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                ->where('semua_mhs_mbkm.nim','LIKE','%'.$req->searchinput.'%')
                ->orWhere('semua_mhs_mbkm.nama','LIKE','%'.$req->searchinput.'%')
                ->where(function ($query){
                  $query->where('nip_dosenpa',session('nip'));
                  })->get();
    }else{
      $search = DB::table('semua_mhs_mbkm')
                ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                ->where('semua_mhs_mbkm.nim','LIKE','%'.$req->searchinput.'%')
                ->orWhere('semua_mhs_mbkm.nama','LIKE','%'.$req->searchinput.'%')
                ->get();
    }


    return view('mhsdibimbingsearch', ['datamhsdbmbng'=>$search]);


  }


}

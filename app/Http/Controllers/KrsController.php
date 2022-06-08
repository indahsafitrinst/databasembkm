<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KrsController extends Controller
{
  public function tampilkanProfil(){
    if(session()->has('nim')){
      $nim = session()->get('nim');
    }
      $profil = DB::table('tbl_mahasiswa')
                ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->first();

      $krs = DB::table('tbl_krs')
                ->join('tbl_mahasiswa','tbl_krs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->get();

      $sks = DB::table('tbl_krs')
                ->join('tbl_mahasiswa','tbl_krs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->select(DB::raw("SUM(sks) as total"))
                ->first();


      return view('halkrs')->with('profils',$profil)->with('krs',$krs)->with('sks',$sks);
                // return view('halkrs',['profils'=>$profil]);
    }

    public function ubahkrs($nim){

      $matakuliah = DB::table('tbl_matakuliah')->get();
      
      return view('ubahkrs')->with('matakuliah',$matakuliah);

    }

  }

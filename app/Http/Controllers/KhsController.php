<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KhsController extends Controller
{
  public function tampilkanKhs(){
    if(session()->has('nim')){
      $nim = session()->get('nim');
    }

      // $semester = DB::table('tbl_khs')->where('semester',$semester)->get();

      $profil = DB::table('tbl_khs')
                ->join('tbl_mahasiswa', 'tbl_khs.nim','=','tbl_mahasiswa.nim')
                ->where('tbl_khs.nim','=',$nim)
                ->first();

      $datakhs = DB::table('tbl_khs')
                ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->get();

      $khs = DB::table('tbl_khs')
                ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->get();

      $sks = DB::table('tbl_khs')
                ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->select(DB::raw("SUM(sks) as total"))
                ->first();

      $ip = DB::table('tbl_khs')
                ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->select(DB::raw("SUM(tbl_matakuliah.sks*tbl_khs.nilai) / SUM(tbl_matakuliah.sks) AS ip_semester"))
                ->first();


      return view('halkhs')->with('profils',$profil)->with('khs',$khs)->with('sks',$sks)->with('ip',$ip);
                // return view('halkrs',['profils'=>$profil]);
    }

    public function showKhs($nim){
      if(session()->has('nim')){
        $nim = session()->get('nim');
      }



    }

  }

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MahasiswaMBKMController extends Controller
{
    public function tampilDataMhsMBKM($key_semester, $key_nimmbkm){
      $showdata = DB::table('semua_mhs_mbkm_alldata')
                  ->where('nim',$key_nimmbkm)
                  ->where('semester',$key_semester)
                  ->first();

      return view('detailmhsmbkm')->with('datamhsmbkm',$showdata);
    }

    public function hapusDataMhsMBKM(Request $req){
      //POST METHOD
      $deletemhsmbkm = DB::table('tbl_mhsmbkm')
                        ->where('id_mhsmbkm', $req->idmhsmbkm)->get();
      //cek dia punya dokumen transkrip nilai atau enggak

      return view('/testpage');
    }
}

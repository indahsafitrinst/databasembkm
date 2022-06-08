<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardDosen(){
      $getpengumuman = DB::table('tbl_pengumuman')
      ->join('tbl_dosen','tbl_pengumuman.nip_penulis','=','tbl_dosen.nip')
      ->get();

      return view('dashboarddosen', ['datapengmmn'=>$getpengumuman]);
    }
}

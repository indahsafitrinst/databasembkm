<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarMhsMBKMController extends Controller
{
    public function daftarMhsMBKM(){
      $getalldata = DB::table('semua_mhs_mbkm')->get();

      return view('daftarmhsmbkm')->with('mhsmbkms',$getalldata);
    }

}
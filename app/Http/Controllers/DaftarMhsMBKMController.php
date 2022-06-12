<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarMhsMBKMController extends Controller
{
    public function daftarMhsMBKM(){
      $getalldata = DB::table('semua_mhs_mbkm_alldata')->get();

      return view('daftarmhsmbkm')->with('mhsmbkms',$getalldata);
    }

    public function searchDaftarMhsMBKM(Request $req){
      $search =  DB::table('semua_mhs_mbkm_alldata')
                  ->where('nim','LIKE','%'.$req->searchinput.'%')
                  ->orWhere('nama','LIKE','%'.$req->searchinput.'%')
                  ->get();

      return view('daftarmhsmbkmsearch')->with('mhsmbkms',$search);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarKRSMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarKRSMahasiswa()
    {
        $krs = DB::table('daftar_krs_mahasiswa')->distinct()->get();
        // dd($krs);
        return view("daftarkrsmahasiswa", compact("krs"));
    }

    public function detailKRSMahasiswa($nim, $semester)
    {
        $krs = DB::table('v_detail_krs')->where('nim',$nim)->where('semester',$semester)->get();
        //dd($krs);
        return view('detailkrsmahasiswa',compact('krs'));
    }




}
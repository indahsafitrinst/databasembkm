<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KonversiNilaiController extends Controller
{
  public function daftarKonvNilai(){
    $getdata = DB::table('tbl_docskonvnilai')
                ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')->get();

    return view('daftarkonvnilai',['datakonvnilai'=>$getdata]);
  }

  public function tolakKonvNilai(Request $req){

    $tolak = DB::table('tbl_docskonvnilai')
              ->where('id_dokumen',$req->iddokumen)
              ->update([
                'status'=>3
              ]);

    $update = DB::table('tbl_mhsmbkm')
              ->join('tbl_docskonvnilai', 'tbl_mhsmbkm.id_mhsmbkm','=','tbl_docskonvnilai.id_mhsmbkm')
              ->where('id_dokumen',$req->iddokumen)
              ->update([
                'statusmbkm'=>1
              ]);
    $getdata = DB::table('tbl_docskonvnilai')
                ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')->get();


    if($tolak){
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Berhasil ditolak!"]);
    }else{
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Gagal ditolak!"]);
    }

  }

  public function hapusKonvNilai(Request $req){
    $delete = DB::table('tbl_docskonvnilai')
              ->where('id_dokumen',$req->iddokumen)
              ->delete();
    $update = DB::table('tbl_mhsmbkm')
              ->join('tbl_docskonvnilai', 'tbl_mhsmbkm.id_mhsmbkm','=','tbl_docskonvnilai.id_mhsmbkm')
              ->where('id_dokumen',$req->iddokumen)
              ->update([
                'statusmbkm'=>1
              ]);
    $getdata = DB::table('tbl_docskonvnilai')
                ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')->get();


    if($delete){
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Berhasil dihapus!"]);
    }else{
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Gagal dihapus!"]);
    }
  }
  public function prosesKonvNilai($key_idmhsmbkm){
    $getnim = DB::table('tbl_mhsmbkm')->where('id_mhsmbkm',$key_idmhsmbkm)->first(['nim','semester']);

    $getkrs = DB::table('tbl_krs')
              ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
              ->where('nim',$getnim->nim)
              ->where('semester',$getnim->semester)
              ->get();
    $datamhs = DB::table('tbl_mahasiswa')
                ->join('tbl_mhsmbkm','tbl_mahasiswa.nim','=','tbl_mhsmbkm.nim')
                ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                ->where('tbl_mahasiswa.nim',$getnim->nim)
                ->first();

    $datadocs = DB::table('semua_mhs_mbkm_alldata')
                  ->join('tbl_docskonvnilai','semua_mhs_mbkm_alldata.id_mhsmbkm','=','tbl_docskonvnilai.id_mhsmbkm')
                  ->where('tbl_docskonvnilai.id_mhsmbkm',$key_idmhsmbkm)
                  ->first();

    return view('prosesterimakonvnilai',['datakrs'=>$getkrs, 'datamhs'=>$datamhs, 'datadocs'=>$datadocs]);
  }

  public function insertToKhs(Request $req){

  }
}

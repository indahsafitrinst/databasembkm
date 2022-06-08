<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KonversiNilaiController extends Controller
{
  public function daftarKonvNilai(){
    $getdata = DB::table('tbl_docskonvnilai')
                ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')->get();

    return view('daftarkonvnilai',['datakonvnilai'=>$getdata]);
  }

  public function tolakKonvNilai(Request $req){
    DB::beginTransaction();
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
      DB::commit();
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek1'=>"Permohonan konversi berhasil ditolak! Merefresh halaman..."]);
    }else{
      DB::rollBack();
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek2'=>"Permohonan konversi gagal ditolak. Merefresh halaman..."]);
    }

  }

  public function hapusKonvNilai(Request $req){
    DB::beginTransaction();
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
      DB::commit();
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Berhasil dihapus!"]);
    }else{
      DB::rollback();
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
                  ->where('status',1)
                  ->first();

    return view('prosesterimakonvnilai',['datakrs'=>$getkrs, 'datamhs'=>$datamhs, 'datadocs'=>$datadocs]);
  }

  public function insertToKhs(Request $req){//COBA BUAT BIAR ADA SAVEPOINT SAMA COMMITNYA DISINI
    DB::beginTransaction();
    $getnimsem = DB::table('semua_mhs_mbkm_alldata')
                  ->where('id_mhsmbkm',$req->idmbkm)
                  ->first();
    $getnim = DB::table('tbl_mhsmbkm')->where('id_mhsmbkm',$req->idmbkm)->first(['nim','semester']);

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
                  ->where('tbl_docskonvnilai.id_mhsmbkm',$req->idmbkm)
                  ->where('status',1)
                  ->first();
    $berhasil = true;
    foreach ($req->input('matkul') as $attrKey => $val) {
      foreach ($req->input('score.' . $attrKey) as $attr_valKey => $value) {
        if(!isset($value)){//klo ga ada value di formnya
          DB::rollBack();
          return view('prosesterimakonvnilai',[
            'datakrs'=>$getkrs,
            'datamhs'=>$datamhs,
            'datadocs'=>$datadocs
            ])->with('cek2','Terjadi kesalahan saat memasukkan nilai KHS!');
        }
        $inserttokhs = DB::table('tbl_khs')
                        ->insert([
                          'nim'=>$getnimsem->nim,
                          'semester'=>$getnimsem->semester,
                          'kode_matakuliah'=>$val,
                          'nilai'=>$value
                        ]);
        if(!$inserttokhs){//klo somehow ga bisa masuk datanya
          DB::rollBack();
          return view('prosesterimakonvnilai',[
            'datakrs'=>$getkrs,
            'datamhs'=>$datamhs,
            'datadocs'=>$datadocs
            ])->with('cek2','Terjadi kesalahan saat memasukkan nilai KHS! Lihat KHS sekarang!');
        }
      }
    }
    if($berhasil==true){//klo berhasil
      $update = DB::table('tbl_docskonvnilai')
                ->where('id_dokumen',$datadocs->id_dokumen)
                ->where('status',1)
                ->update([
                  'status'=>2
                ]);
      $updatemhsmbkm = DB::table('tbl_mhsmbkm')
                        ->where('id_mhsmbkm',$req->idmbkm)
                        ->update([
                          'statusmbkm'=>3
                        ]);

      if(!$update){
        DB::rollBack();
      }
      DB::commit();
      return view('prosesterimakonvnilai',['datakrs'=>$getkrs, 'datamhs'=>$datamhs, 'datadocs'=>$datadocs])->with('cek','Nilai berhasil dimasukkan ke KHS!');
    }else{
      DB::rollBack();
      return view('prosesterimakonvnilai',[
        'datakrs'=>$getkrs,
        'datamhs'=>$datamhs,
        'datadocs'=>$datadocs
        ])->with('cek2','Terjadi kesalahan saat memasukkan nilai ke KHS!');
    }
  }
}

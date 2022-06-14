<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaMBKMController extends Controller
{
    public function tampilDataMhsMBKM($key_semester, $key_nimmbkm){
      //get data mhsmbkm
      $showdata = DB::table('semua_mhs_mbkm_alldata')
                  ->join('tbl_terimapermmbkm','semua_mhs_mbkm_alldata.id_mhsmbkm','=','tbl_terimapermmbkm.id_mhsmbkm')
                  ->where('nim',$key_nimmbkm)
                  ->where('semester_perm',$key_semester)
                  ->first();
      //cek dia ada file transkripnilai atau enggak
      $cektranskripnilai = DB::table('tbl_docskonvnilai')
                            ->where('id_mhsmbkm',$showdata->id_mhsmbkm)
                            ->whereIn('status',[1,2])
                            ->first();

      if(!$showdata){//klo data mhsmbkmnya ga ada...
        return view('errordsn')->with('cek','Data Mahasiswa '.$key_nimmbkm.' pada semester '.$key_semester.' tidak ada...');
      }
      if(!$cektranskripnilai){//klo ga ada transkripnilainya
        return view('detailmhsmbkm')->with('datamhsmbkm',$showdata);
      }
      return view('detailmhsmbkm')->with('datamhsmbkm',$showdata)->with('datatranskripnilai',$cektranskripnilai);
    }

    public function hapusDataMhsMBKM(Request $req){
      DB::beginTransaction();
      //cek ada transkrip nilai  atau nggak
      $cektranskripnilai = DB::table('tbl_docskonvnilai')->where('id_mhsmbkm',$req->idmhsmbkm)->first();
      if(isset($cektranskripsinilai->id_mhsmbkm)){//jika ada hapus dulu
        $deletedocskonvnilai = DB::table('tbl_docskonvnilai')->where('id_dokumen',$cektranskripsinilai->id_dokumen)->delete();
        if(!$deletedocskonvnilai){//jika gagal menghapus
          DB::rollBack();
          return view('detailmhsmbkm');
        }
      }
      //hapus dokumen terima permohonanmbkm alias konversi krs
      $deletedocsterimaperm = DB::table('tbl_terimapermmbkm')->where('id_mhsmbkm', $req->idmhsmbkm)->delete();
      //end hapus dokumen terima permohonanmbkm alias konversi krs
      //get nim sama semester permohonan mbkm dari tbl_mhsmbkm
      $getidperm = DB::table('tbl_mhsmbkm')->where('id_mhsmbkm', $req->idmhsmbkm)->first();
      $varidpermohonan = $getidperm->id_permohonanmbkm;
      //end get nim sama semester permohonan mbkm dari tbl_mhsmbkm
      //hapus data tbl_mhsmbkm
      $deletemhsmbkm = DB::table('tbl_mhsmbkm')
                        ->where('id_mhsmbkm', $req->idmhsmbkm)->delete();
      //end hapus tbl_mhsmbkm
      //hapus data permohonanmbkm
      $deletepermohonan = DB::table('tbl_permohonanmbkm')->where('id_permohonan',$varidpermohonan)->delete();
      //end hapus data permohonanmbkm
      if($deletemhsmbkm&&$deletepermohonan&&$deletedocsterimaperm){
        DB::commit();
        return view('detailmhsmbkm')->with('cek1','Data mahasiswa berhasil dihapus seluruhnya.');
      }else{
        DB::rollback();
        return view('detailmhsmbkm')->with('cek2','Data mahasiswa gagal dihapus.');
      }
    }
}

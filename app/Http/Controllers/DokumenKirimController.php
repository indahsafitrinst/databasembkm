<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DokumenKirimController extends Controller
{
    public function getDocsTerkirim(){
      $getdata = DB::table('tbl_terimapermmbkm')
                  ->join('semua_mhs_mbkm_alldata','tbl_terimapermmbkm.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                  ->where('nip_dosenpemeriksa',session('nip'))->get();
      return view('dkmndikirim', ['docsdikirim'=>$getdata]);
    }

    public function  hapusDocsTerimaKRS(Request $req){
      DB::beginTransaction();
      //get variabel
      $getidmhsmbkm = DB::table('tbl_terimapermmbkm')->where('id_docsterimakrs',$req->iddocs)->first();
      $varidmhsmbkm = $getidmhsmbkm->id_mhsmbkm;
      $getidperm = DB::table('tbl_mhsmbkm')->where('id_mhsmbkm',$varidmhsmbkm)->first();
      $varidperm = $getidperm->id_permohonanmbkm;
      //end get variabel
      //delete dokumen terima MBKM
      $delete = DB::table('tbl_terimapermmbkm')
                ->where('id_docsterimakrs',$req->iddocs)
                ->delete();
      //end delete dokumen terima mbkm
      //update status mhsmbkm alias delete
      $deletemhsmbkm = DB::table('tbl_mhsmbkm')
                ->where('id_mhsmbkm',$varidmhsmbkm)
                ->delete();
      //end uppdate status mhsmbkm alias delete
      //update status permmbkm
      $updatepermohonanstatus = DB::table('tbl_permohonanmbkm')
                                ->where('id_permohonan',$varidperm)
                                ->update([
                                  'status'=>1
                                ]);
      //end update status permmbkm
      if($delete&&$deletemhsmbkm&&$updatepermohonanstatus){//jika berhasil
        DB::commit();
        $getdata = DB::table('tbl_terimapermmbkm')
                    ->join('semua_mhs_mbkm_alldata','tbl_terimapermmbkm.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                    ->where('nip_dosenpemeriksa',session('nip'))->get();
        return view('dkmndikirim', ['docsdikirim'=>$getdata])->with('cek','Dokumen penerimaan konversi KRS berhasil dihapus! Merefresh halaman...');
      }else{//jika gagal
        $getdata = DB::table('tbl_terimapermmbkm')
                    ->join('semua_mhs_mbkm_alldata','tbl_terimapermmbkm.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                    ->where('nip_dosenpemeriksa',session('nip'))->get();
        return view('dkmndikirim', ['docsdikirim'=>$getdata])->with('cek2','Dokumen penerimaan konversi KRS gagal dihapus. Merefresh halaman...');
        DB::rollBack();
      }
    }

    public function searchDocsTerkirim(Request $req){
      $search = DB::table('tbl_terimapermmbkm')
                  ->join('semua_mhs_mbkm_alldata','tbl_terimapermmbkm.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                  ->where('semua_mhs_mbkm_alldata.nim','LIKE','%'.$req->searchinput.'%')
                  ->orWhere('semua_mhs_mbkm_alldata.nama','LIKE','%'.$req->searchinput.'%')
                  ->where(function ($query){
                    $query->where('nip_dosenpemeriksa',session('nip'));
                    })->get();

      return view('dkmndikirim', ['docsdikirim'=>$search]);
    }
}

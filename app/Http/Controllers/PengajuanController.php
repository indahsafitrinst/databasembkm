<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class pengajuanController extends Controller
{
    public function uploadPengajuan(Request $req){

      $filenamesilabus = 'silabus'.time().'.'.$req->silabus->extension();
      $req->silabus->move(public_path('silabus'),$filenamesilabus);
      $lokasisilabus = '/silabus/'.$filenamesilabus;

      $filenamebuktilulus = 'buktilulus'.time().'.'.$req->buktilulus->extension();
      $req->buktilulus->move(public_path('buktilulus'),$filenamebuktilulus);
      $lokasibuktilulus = '/buktilulus/'.$filenamebuktilulus;

      $filenamepermohonankonvkrs = 'permohonankonvkrs'.time().'.'.$req->permohonankonvkrs->extension();
      $req->permohonankonvkrs->move(public_path('permohonankonvkrs'),$filenamepermohonankonvkrs);
      $lokasipermohonankonvkrs = '/permohonankonvkrs/'.$filenamepermohonankonvkrs;

      $inserttodb = DB::table('tbl_permohonanmbkm');
      $inserttodb->insert([
        'nim_mhs'=>session('nim'),
        'lokasi_filebuktilulus'=>$lokasibuktilulus,
        'lokasi_filesilabus'=>$lokasisilabus,
        'lokasi_filekonvkrs'=>$lokasipermohonankonvkrs,
        'status'=>1,
        'waktu_unggah'=>Carbon::now()->toDateTimeString()
      ]);

      return redirect('/merdekabelajar');

    }

    public function uploadPengajuanKonvNilai(Request $req){
      $filenamekonvnilai = 'konvnilai'.time().'.'.$req->transkripnilai->extension();
      $req->transkripnilai->move(public_path('konvnilai'),$filenamekonvnilai);
      $lokasikonvnilai = '/konvnilai/'.$filenamekonvnilai;

      $getidmhsmbkm = DB::table('tbl_mhsmbkm')
                      ->where('nim',session('nim'))
                      ->where('semester',session('semester'))
                      ->first();
                      


      $inserttodb = DB::table('tbl_docskonvnilai')
                    ->insert([
                      'lokasi_filekonvnilai'=>$lokasikonvnilai,
                      'status'=>1,
                      'id_mhsmbkm'=>$getidmhsmbkm->id_mhsmbkm,
                      'waktu_unggah'=>Carbon::now()->toDateTimeString()
                    ]);
      $updatedbmhsmbkm = DB::table('tbl_mhsmbkm')
                          ->where('id_mhsmbkm',$getidmhsmbkm->id_mhsmbkm)
                          ->update([
                            'statusmbkm'=>2
                          ]);

      if($inserttodb&&$updatedbmhsmbkm){
        return redirect('/merdekabelajar');
      }else{
        return view('error')->with('error','Terjadi kesalahan saat mengupload dokumen.');
      }

    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        'semester_perm'=>session('semester'),
        'status'=>1,
        'waktu_unggah'=>Carbon::now()->toDateTimeString()
      ]);
      $getdatadosenpa = DB::table('tbl_mahasiswa')
                      ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                      ->where('nim',session('nim'))
                      ->first();
      $getalldosenlevel1 = DB::table('tbl_dosen')->where('level',1)->get();

      $notifdosenpa = DB::table('tbl_notifikasi')
                  ->insert([
                    'nip'=>$getdatadosenpa->nip,
                    'isi_notif'=>'Permohonan MBKM baru telah masuk!',
                    'waktu'=>Carbon::now()->toDateTimeString()
                  ]);
      foreach($getalldosenlevel1 as $notif){
        DB::table('tbl_notifikasi')
                    ->insert([
                      'nip'=>$notif->nip,
                      'isi_notif'=>'Permohonan MBKM baru telah masuk!',
                      'waktu'=>Carbon::now()->toDateTimeString()
                    ]);
      }

      return redirect('/merdekabelajar');

    }

    public function uploadPengajuanKonvNilai(Request $req){
      $filenamekonvnilai = 'konvnilai'.time().'.'.$req->transkripnilai->extension();
      $req->transkripnilai->move(public_path('konvnilai'),$filenamekonvnilai);
      $lokasikonvnilai = '/konvnilai/'.$filenamekonvnilai;

      $getidmhsmbkm = DB::table('tbl_mhsmbkm')
                      ->where('id_permohonanmbkm',$req->id_permohonan)
                      ->first();



      $inserttodb = DB::table('tbl_docskonvnilai')
                    ->insert([
                      'lokasi_filekonvnilai'=>$lokasikonvnilai,
                      'status'=>1,
                      'id_mhsmbkm'=>$getidmhsmbkm->id_mhsmbkm,
                      'waktu_unggah'=>Carbon::now()->toDateTimeString()
                    ]);
      // $updatedbmhsmbkm = DB::table('tbl_mhsmbkm')
      //                     ->where('id_mhsmbkm',$getidmhsmbkm->id_mhsmbkm)
      //                     ->update([
      //                       'statusmbkm'=>2
      //                     ]);

      if($inserttodb){
        $getdatadosenpa = DB::table('tbl_mahasiswa')
                        ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                        ->where('nim',session('nim'))
                        ->first();
        $getalldosenlevel1 = DB::table('tbl_dosen')->where('level',1)->get();

        $notifdosenpa = DB::table('tbl_notifikasi')
                    ->insert([
                      'nip'=>$getdatadosenpa->nip,
                      'isi_notif'=>'Permohonan konversi nilai baru telah masuk!',
                      'waktu'=>Carbon::now()->toDateTimeString()
                    ]);
        foreach($getalldosenlevel1 as $notif){
          DB::table('tbl_notifikasi')
                      ->insert([
                        'nip'=>$notif->nip,
                        'isi_notif'=>'Permohonan konversi nilai baru telah masuk!',
                        'waktu'=>Carbon::now()->toDateTimeString()
                      ]);
        }


        return redirect('/merdekabelajar');
      }else{
        return view('error')->with('error','Terjadi kesalahan saat mengupload dokumen.');
      }

    }

    public function dataHiddenKonvNilai(){
      $getidperm = DB::table('tbl_permohonanmbkm')
                    ->where('nim_mhs',session('nim'))
                    ->where('semester_perm',session('semester'))
                    ->where('status',2)
                    ->first();

      return view('pengajuankonvnilai', ['datahidden'=>$getidperm]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermohonanMBKMController extends Controller
{
    public function tampilDataPermMBKM(){
      $permmbkm = DB::table('daftar_permohonan_mbkm')
                ->orderBy('status', 'asc')
                ->get();

      return view('permohonanmbkm',['permmbkm'=>$permmbkm]);


    }

    public function prosesPermMBKM($key_permmbkm){
      $permmbkm =DB::table('daftar_permohonan_mbkm')->where('id_permohonan', $key_permmbkm)->where('status', 1)
                ->first();

      $mitras = DB::table('tbl_mitra')->get();
      $jenismbkm = DB::table('tbl_jenismbkm')->get();
      return view('prosesterimambkm')->with('permmbkm',$permmbkm)->with('mitras',$mitras)->with('jenismbkm',$jenismbkm);
    }

    public function terimaPermMBKM(Request $req){
      DB::beginTransaction();

      $getsemester = DB::table('tbl_mahasiswa')->where('nim',$req->nim_mhsmbkm)->first();



      //masukan ke tbl_mhsmbkm
      $newdata = DB::table('tbl_mhsmbkm')
                  ->insert([
                    'nim'=>$req->nim_mhsmbkm,
                    'kode_mitra'=>$req->kodemitra,
                    'id_jenismbkm'=>$req->idjenismbkm,
                    'nama_program'=>$req->namaprogram,
                    'statusmbkm'=>1,
                    'nip_dosenprodi'=>session('nip'),
                    'semester'=>$getsemester->semester,
                    'id_permohonanmbkm'=>$req->id_permohonan
                  ]);

      //end masukan ke tbl mhsmbkm
      //masukan ke trimapermmbkm
      $getidmhsmbkm = DB::table('tbl_permohonanmbkm')
                    ->join('tbl_mhsmbkm','tbl_permohonanmbkm.id_permohonan','=','tbl_mhsmbkm.id_permohonanmbkm')
                    ->where('id_permohonan',$req->id_permohonan)->first();
      $filenamekonvkrsdosen = 'konvkrsdosen'.time().'.'.$req->filekonvkrsdosen->extension();
      $req->filekonvkrsdosen->move(public_path('konvkrsdosen'),$filenamekonvkrsdosen);
      $lokasifilekonvkrsdosen = '/konvkrsdosen/'.$filenamekonvkrsdosen;

      $inserterimapermmbkm = DB::table('tbl_terimapermmbkm')
                              ->insert([
                                'id_mhsmbkm'=>$getidmhsmbkm->id_mhsmbkm,
                                'lokasi_filekonvkrsditerima'=>$lokasifilekonvkrsdosen,
                                'nip_dosenpemeriksa'=>session('nip'),
                                'waktu_unggah'=>Carbon::now()->toDateTimeString()
                              ]);
      //end masukan ke terima permmbkm
      //masukan ke tabel llog
      $log = DB::table('tbl_log')
              ->insert([
                'pelaku'=>session('nip'),
                'aksi'=>"Penerimaan Permohonan MBKM",
                'objek_new'=>$req->nim_mhsmbkm,
                'waktu'=>Carbon::now()->toDateTimeString()
              ]);
      //end masukkkan ke table log
      //update status permohonanmbkm
      $updatepermohonan = DB::table('tbl_permohonanmbkm')->where('nim_mhs',$req->nim_mhsmbkm)->where('status',1);
      $updatepermohonan->update(['status'=>2]);
      //end update status permohonan mkbm
      //dapatkan kembali data untuk halaman prosesterimambkm
      $permmbkm =DB::table('daftar_permohonan_mbkm')->where('id_permohonan', $req->id_permohonan)
                ->first();

      $mitras = DB::table('tbl_mitra')->get();
      $jenismbkm = DB::table('tbl_jenismbkm')->get();
      //end dapatakan kembali data untuk halaman prosesterimambkm
      if($newdata&&$log&&$updatepermohonan){
        DB::commit();
        return view('prosesterimambkm')
        ->with('permmbkm',$permmbkm)
        ->with('mitras',$mitras)
        ->with('jenismbkm',$jenismbkm)
        ->with('cek','Permohonan berhasil diterima!');

      }else{
        DB::rollBack();
        return view('prosesterimambkm')
        ->with('permmbkm',$permmbkm)
        ->with('mitras',$mitras)
        ->with('jenismbkm',$jenismbkm)
        ->with('cek2','Terjadi kesalahan. Permohonan gagal diterima.');
      }


    }

    public function tolakPermMBKM(Request $req){
      $tolakperm = DB::table('tbl_permohonanmbkm')
                  ->where('id_permohonan',$req->idpermohonan)
                  ->update([
                    'status'=>3,
                  ]);

      $logdata = DB::table('tbl_log')
                  ->insert([
                    'pelaku'=>session('nip'),
                    'aksi'=>"Menolak Permohonan MBKM",
                    'objek_old'=>$req->idpermohonan,
                    'waktu'=>Carbon::now()->toDateTimeString()
                  ]);

      $permmbkm =DB::table('daftar_permohonan_mbkm')->where('id_permohonan', $req->idpermohonan)->where('status', 3)
                ->first();
      $mitras = DB::table('tbl_mitra')->get();
      $jenismbkm = DB::table('tbl_jenismbkm')->get();
      return view('prosesterimambkm')->with('cek','Permohonan berhasil ditolak.')->with('permmbkm',$permmbkm)->with('mitras',$mitras)->with('jenismbkm',$jenismbkm);

    }

    public function hapusPermMBKM(Request $req){
      DB::beginTransaction();
      $hapusperm = DB::table('tbl_permohonanmbkm')
                    ->where('id_permohonan',$req->idpermohonan)
                    ->delete();
      $permmbkm =DB::table('daftar_permohonan_mbkm')
                ->orderBy('status', 'asc')
                ->get();


      if($hapusperm==true){
        DB::commit();
        return view('permohonanmbkm')->with('permmbkm',$permmbkm)->with('cek1','Permohonan berhasil dihapus!');
      }else{
        DB::rollBack();
        return view('permohonanmbkm')->with('permmbkm',$permmbkm)->with('cek2', 'Permohonan gagal dihapus!');
      }
    }

    public function searchPermMBKM(Request $req){

      $search = DB::table('daftar_permohonan_mbkm')
                ->where('nama','LIKE','%'.$req->searchinput.'%')
                ->orwhere('nim_mhs','LIKE','%'.$req->searchinput.'%')
                ->get();
      return view('permohonanmbkmsearch', ['datasearch'=>$search]);

    }
}

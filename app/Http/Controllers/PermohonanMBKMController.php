<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PermohonanMBKMController extends Controller
{
    public function tampilDataPermMBKM(){
      $permmbkm =DB::table('daftar_permohonan_mbkm')
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
      $indata = $req->input();
      $i= 1;
      $idjenismbkm = (int)$req->idjenismbkm;

      $getsemester = DB::table('tbl_mahasiswa')->where('nim',$req->nim_mhsmbkm)->first();


      $newdata = DB::table('tbl_mhsmbkm')
                  ->insert([
                    'nim'=>$req->nim_mhsmbkm,
                    'kode_mitra'=>$req->kodemitra,
                    'id_jenismbkm'=>$req->idjenismbkm,
                    'nama_program'=>$req->namaprogram,
                    'statusmbkm'=>$i,
                    'nip_dosenprodi'=>session('nip'),
                    'semester'=>$getsemester->semester,
                    'id_permohonanmbkm'=>$req->id_permohonan
                  ]);
      $log = DB::table('tbl_log')
              ->insert([
                'pelaku'=>session('nip'),
                'aksi'=>"Penerimaan Permohonan MBKM",
                'objek_new'=>$req->nim_mhsmbkm,
                'waktu'=>Carbon::now()->toDateTimeString()
              ]);
      $updatepermohonan = DB::table('tbl_permohonanmbkm')->where('nim_mhs',$req->nim_mhsmbkm)->where('status',1);
      $updatepermohonan->update(['status'=>2]);

      if($newdata&&$log&&$updatepermohonan){
        return redirect('/mhsmbkm/'.$getsemester->semester.'/'.$req->nim_mhsmbkm);
      }else{
        return "Terjadi KESALAHAN...";
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
      $hapusperm = DB::table('tbl_permohonanmbkm')
                    ->where('id_permohonan',$req->idpermohonan)
                    ->delete();
      $permmbkm =DB::table('daftar_permohonan_mbkm')
                ->orderBy('status', 'asc')
                ->get();


      if($hapusperm==true){
        $success='Berhasil dihapus!';
        return view('permohonanmbkm')->with('permmbkm',$permmbkm)->with('cek',$success);
      }else{
        $failed = 'Gagal dihapus!';
        return view('permohonanmbkm')->with('cek', $failed);
      }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KonversiNilaiController extends Controller
{
  public function daftarKonvNilai(){


    if(session('level')==1){
      $getdata = DB::table('tbl_docskonvnilai')
                  ->join('semua_mhs_mbkm_alldata', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')->get();
    }else{
      $getdata = DB::table('tbl_docskonvnilai')
                  ->join('semua_mhs_mbkm_alldata', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                  ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                  ->where('tbl_mahasiswa.nip_dosenpa',session('nip'))
                  ->get();
    }


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
                ->join('semua_mhs_mbkm_alldata', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')->get();


    $getnimdata = DB::table('tbl_docskonvnilai')
                ->join('semua_mhs_mbkm_alldata', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm_alldata.id_mhsmbkm')
                ->where('id_dokumen',$req->iddokumen)->first();
    $notifmhs = DB::table('tbl_notifikasi')
                ->insert([
                  'nim'=>$getnimdata->nim,
                  'isi_notif'=>'Permohonan konversi nilai anda ditolak!',
                  'waktu'=>Carbon::now()->toDateTimeString()
                ]);


    if($tolak){
      $log = DB::table('tbl_log')
              ->insert([
                'pelaku'=>session('nip'),
                'aksi'=>"Penolakaan konversi nilai",
                'objek_new'=>$req->iddokumen,
                'waktu'=>Carbon::now()->toDateTimeString()
              ]);
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
      $log = DB::table('tbl_log')
              ->insert([
                'pelaku'=>session('nip'),
                'aksi'=>"Penghapusan konversi nilai",
                'objek_new'=>$req->iddokumen,
                'waktu'=>Carbon::now()->toDateTimeString()
              ]);
      DB::commit();
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Berhasil dihapus!"]);
    }else{
      DB::rollback();
      return view('daftarkonvnilai',['datakonvnilai'=>$getdata, 'cek'=>"Gagal dihapus!"]);
    }
  }
  public function prosesKonvNilai($key_idmhsmbkm){
    $getnim = DB::table('tbl_mhsmbkm')
              ->join('tbl_permohonanmbkm','tbl_mhsmbkm.id_permohonanmbkm','=','tbl_permohonanmbkm.id_permohonan')
              ->where('id_mhsmbkm',$key_idmhsmbkm)

              ->first(['nim_mhs','semester_perm']);

    $getkrs = DB::table('tbl_krs')
              ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
              ->where('nim',$getnim->nim_mhs)
              ->where('semester',$getnim->semester_perm)
              ->get();
    $datamhs = DB::table('tbl_mahasiswa')
                ->join('tbl_permohonanmbkm','tbl_mahasiswa.nim','=','tbl_permohonanmbkm.nim_mhs')
                ->join('tbl_mhsmbkm','tbl_permohonanmbkm.id_permohonan','=','tbl_mhsmbkm.id_permohonanmbkm')
                ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                ->where('tbl_mahasiswa.nim',$getnim->nim_mhs)
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
    $getnim = DB::table('tbl_mhsmbkm')
              ->join('tbl_permohonanmbkm','tbl_mhsmbkm.id_permohonanmbkm','=','tbl_permohonanmbkm.id_permohonan')
              ->where('id_mhsmbkm',$req->idmbkm)->first(['nim_mhs','semester_perm']);

    $getkrs = DB::table('tbl_krs')
              ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
              ->where('nim',$getnim->nim_mhs)
              ->where('semester',$getnim->semester_perm)
              ->get();
    $datamhs = DB::table('tbl_mahasiswa')
                ->join('tbl_permohonanmbkm','tbl_mahasiswa.nim','=','tbl_permohonanmbkm.nim_mhs')
                ->join('tbl_mhsmbkm','tbl_permohonanmbkm.id_permohonan','=','tbl_mhsmbkm.id_permohonanmbkm')
                ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                ->where('tbl_mahasiswa.nim',$getnim->nim_mhs)
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
                          'semester'=>$getnimsem->semester_perm,
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
        $log = DB::table('tbl_log')
                ->insert([
                  'pelaku'=>session('nip'),
                  'aksi'=>"Memasukkkan/mengkonversi nilai ke KHS. old=nim ,new=nilai",
                  'objek_old'=>$getnimsem->nim,
                  'objek_new'=>$value,
                  'waktu'=>Carbon::now()->toDateTimeString()
                ]);
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
      $notifmhs = DB::table('tbl_notifikasi')
                  ->insert([
                    'nim'=>$getnimdata->nim,
                    'isi_notif'=>'Permohonan konversi nilai anda telah diterima!',
                    'waktu'=>Carbon::now()->toDateTimeString()
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

  public function searchKonvNilai(Request $req){
    if(session('level')==1){
      $search = DB::table('tbl_docskonvnilai')
                  ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')
                  ->where('nama','LIKE','%'.$req->searchinput.'%')
                  ->orWhere('nim','LIKE','%'.$req->searchinput.'%')
                  ->get();
    }else{
      $search = DB::table('tbl_docskonvnilai')
                  ->join('semua_mhs_mbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','semua_mhs_mbkm.id_mhsmbkm')
                  ->join('tbl_mahasiswa','semua_mhs_mbkm.nim','=','tbl_mahasiswa.nim')
                  ->where(function ($query) use ($req){
                    $query->where('nip_dosenpa',session('nip'))
                          ->where('tbl_mahasiswa.nama','LIKE','%'.$req->searchinput.'%');
                    })
                  ->orWhere(function ($query) use ($req){
                    $query->where('nip_dosenpa',session('nip'))
                          ->where('tbl_mahasiswa.nama','LIKE','%'.$req->searchinput.'%');
                    })

                  ->get();
    }




    return view('daftarkonvnilaisearch',['datakonvnilai'=>$search]);

  }
}

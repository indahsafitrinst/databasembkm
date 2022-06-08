<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    public function daftarPengumuman(){
      $getdata = DB::table('tbl_pengumuman')
                  ->join('tbl_dosen','tbl_pengumuman.nip_penulis','=','tbl_dosen.nip')
                  ->get();

      return view('pengumumandaftar',['datapengumuman'=>$getdata]);
    }

    public function tambahPengumuman(Request $req){
      DB::beginTransaction();
      $insert = DB::table('tbl_pengumuman')
                ->insert([
                  'judul'=>$req->judulpengumuman,
                  'isi_pengumuman'=>$req->isipengumuman,
                  'nip_penulis'=>session('nip'),
                  'waktu'=>Carbon::now()->toDateTimeString()
                ]);
      if(!$insert){
        DB::rollBack();
        return view('pengumumanbuat')->with('cek2','Penambahan pengumuman gagal... Merefresh halaman..');
      }
      DB::commit();
      return view('pengumumanbuat')->with('cek1','Penambahan pengumuman berhasil... Mengembalikan ke daftar...');
    }

    public function editPengumuman($key_idpengumuman){

      $getdata = DB::table('tbl_pengumuman')
                  ->where('id_pengumuman',$key_idpengumuman)->first();

      if(!$getdata){
        return view('errordsn')->with('Error 404. Link ini tidak ada...');
      }
      if($getdata->nip_penulis!=session('nip')){
        return redirect('/daftarpengumuman');
      }

      return view('pengumumanedit',['datapengumuman'=>$getdata]);
    }

    public function ubahPengumuman(Request $req){
      DB::beginTransaction();
      $ubah = DB::table('tbl_pengumuman')
              ->where('id_pengumuman',$req->idpengumuman)
              ->update([
                'judul'=>$req->judulpengumuman,
                'isi_pengumuman'=>$req->isipengumuman,
                'waktu'=>Carbon::now()->toDateTimeString()
              ]);

      if(!$ubah){
        DB::rollBack();
        $getdata = DB::table('tbl_pengumuman')
                    ->where('id_pengumuman',$key_idpengumuman)->first();

        if(!$getdata){
          return view('errordsn')->with('Error 404. Link ini tidak ada...');
        }
        if($getdata->nip_penulis!=session('nip')){
          return redirect('/daftarpengumuman');
        }

        return view('pengumumanedit',['datapengumuman'=>$getdata])->with('cek2','Perubahan gagal disimpan... Mengembalikan ke daftar...');
      }
      DB::commit();
      return view('pengumumanbuat')->with('cek1','Perubahan berhasil disimpan... Mengembalikan ke daftar...');
    }

    public function hapusPengumuman(Request $req){
      DB::beginTransaction();
      $delete = DB::table('tbl_pengumuman')->where('id_pengumuman',$req->idpengumuman)->delete();
      $getdata = DB::table('tbl_pengumuman')
                  ->join('tbl_dosen','tbl_pengumuman.nip_penulis','=','tbl_dosen.nip')
                  ->get();
      if(!$delete){
        DB::rollBack();
        return view('pengumumandaftar',['datapengumuman'=>$getdata])->with('cek2','Pengumuman gagal dihapus!');
      }


      DB::commit();
      return view('pengumumandaftar',['datapengumuman'=>$getdata])->with('cek1','Pengumuman berhasil dihapus! Merefresh Halaman...');
    }

    public function tampilPengumuman($key_idpengumuman){
      $getdata = DB::table('tbl_pengumuman')
      ->join('tbl_dosen','tbl_pengumuman.nip_penulis','=','tbl_dosen.nip')
      ->where('id_pengumuman',$key_idpengumuman)->first();

      return view('pengumumantampil',['dataptampil'=>$getdata]);
    }
}

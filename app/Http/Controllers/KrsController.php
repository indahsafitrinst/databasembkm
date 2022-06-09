<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KrsController extends Controller
{
  public function tampilkanProfil(){
    if(session()->has('nim')){
      $nim = session()->get('nim');
    }
      $profil = DB::table('tbl_mahasiswa')
                ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->first();

      $krs = DB::table('tbl_krs')
                ->join('tbl_mahasiswa','tbl_krs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->get();

      $sks = DB::table('tbl_krs')
                ->join('tbl_mahasiswa','tbl_krs.nim','=','tbl_mahasiswa.nim')
                ->join('tbl_matakuliah','tbl_krs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                ->where('tbl_mahasiswa.nim','=',$nim)
                ->select(DB::raw("SUM(sks) as total"))
                ->first();


      return view('halkrs')->with('profils',$profil)->with('krs',$krs)->with('sks',$sks);
                // return view('halkrs',['profils'=>$profil]);
    }

    public function ubahkrs($nim){

      $getkrs = DB::table('tbl_krs')->where('nim',$nim)->get();

      $matakuliah = DB::table('tbl_matakuliah')->get();

      return view('ubahkrs')->with('matakuliah',$matakuliah)->with('getkrs',$getkrs);

    }

    public function hapuskrs(){
      if(session()->has('nim')){
        $nim = session()->get('nim');
      }
      if(DB::table('tbl_krs')->where('nim',$nim)->exists()){
        DB::table('tbl_krs')->where('nim',$nim)->delete();
        return redirect('/krs')->with('success','Berhasil dihapus');
      }else{
        return redirect('/krs')->with('error','Tabel Anda Kosong');
      }
    }

    public function update(Request $request){
      DB::beginTransaction();
      if(session()->has('nim')){
        $nim = session()->get('nim');
      }
      $k=1;
      $sksmahasiswa = 0;
      $sum = 0;
      $matkul = $request->input('kode_matakuliah');

      $sksmaks = DB::table('tbl_mahasiswa')->where('nim',$nim)->first();

      $sksmahasiswa += (int)$sksmaks->sks_maks;

      if($request->has('kode_matakuliah')) {
        foreach($matkul as $matkul){
          $sks = DB::table('tbl_matakuliah')
          ->where('kode_matakuliah',$matkul)
          ->first();

          $sum += (int)$sks->sks;
        }
        if($sum>$sksmahasiswa){
          return back()->with('error2','Jumlah SKS Yang Anda Ambil Melebih Batas');
        }
        for($i=0;$i<count($request->kode_matakuliah);$i++)
        {
          $tbl_krs =[
            'nim'             =>$nim,
            'kode_matakuliah' =>$request->kode_matakuliah[$i],
            'semester'        =>5,
          ];
          DB::table('tbl_krs')->insert($tbl_krs);
          DB::commit();
        }
          return redirect('/krs')->with('success2','Berhasil ditambah');
        }else{
          DB::rollBack();
          return back()->with('error','Tidak ada matakuliah yang dipilih');
        }
      }
    }

      // if($sum>=$sksmaks)
      // {
      //   return back()->with('error2','Total SKS Yang Diambil Melebihi Batas');
      // }
      // if($request->has('kode_matakuliah')) {
      //   for($i=1;$i<count($request->kode_matakuliah);$i++)
      //     {
      //       $tbl_krs =[
      //         'nim'             =>$nim,
      //         'kode_matakuliah' =>$request->kode_matakuliah[$i],
      //         'semester'        =>5,
      //         ];
      //         if($sum>=$sksmaks){
      //           return back()->with('error2','Jumlah SKS yang diambil melebih batas');
      //         }else{
      //       DB::table('tbl_krs')->insert($tbl_krs);
      //       DB::commit();
      //     }
      //     }
      //       return redirect('/krs')->with('success2','Berhasil ditambah');
      // }else{
      //   DB::rollback();
      //   return back()->with('error','Tidak ada matakuliah yang dipilih');
      // }




      // foreach ($request->input('sks') as $attrKey => $val) {
      //   foreach ($request->input('kode_matakuliah.'. $attrKey) as $attr_valkey => $value) {
      //     if(!isset($value)){
      //       DB::rollBack();
      //       return redirect()->back()->with('warning','Ada kesalahan');
      //     }

          // $group = $request->input('sks');
          //   foreach($group as $key => $nilai){
          //     $sum += $nilai;
          //   }
          //   echo $sum;
      //   }
      //
      // }

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KhsController extends Controller
{
  public function tampilkankhsMhs(){
    if(!session()->has('nim')) return view('loginmhs');

    $nim = session()->get('nim');
    $nama = session()->get('nama');
    $dataUser = [
      'nim' => session()->get('nim'),
      'nama' => session()->get('nama')
    ];
    DB::statement("SET SQL_MODE=''");
    $khsmhs = DB::table ('tbl_khs')
              ->join('tbl_mahasiswa', 'tbl_khs.nim', '=', 'tbl_mahasiswa.nim' )
              ->join('tbl_matakuliah', 'tbl_khs.kode_matakuliah', '=', 'tbl_matakuliah.kode_matakuliah')
              ->where('tbl_khs.nim', $nim)
              ->get();

    return view('halkhs')->with('khsmhs',$khsmhs)->with('nim',$nim)->with('nama',$nama)->with('user',$dataUser);
  }

  public function tampilkanKhsSemester($semester){
    if(!session()->has('nim')) return view('loginmhs');

    $nim = session()->get('nim');
    $nama = session()->get('nama');
    $dataUser = [
      'nim' => session()->get('nim'),
      'nama' => session()->get('nama')
    ];
    DB::statement("SET SQL_MODE=''");
    $khsmhs = DB::table ('tbl_khs')
              ->join('tbl_mahasiswa', 'tbl_khs.nim', '=', 'tbl_mahasiswa.nim' )
              ->join('tbl_matakuliah', 'tbl_khs.kode_matakuliah', '=', 'tbl_matakuliah.kode_matakuliah')
              ->where('tbl_khs.nim', $nim)
              ->where('tbl_khs.semester', $semester)
              ->get();

    return view('halkhs')->with('khsmhs',$khsmhs)->with('nim',$nim)->with('nama',$nama)->with('user',$dataUser);
  }

//   public function tampilkanKhs(){
//     if(session()->has('nim')){
//       $nim = session()->get('nim');
//     }
//       $profils = DB::table('tbl_khs')
//                 ->join('tbl_mahasiswa', 'tbl_khs.nim','=','tbl_mahasiswa.nim')
//                 ->where('tbl_khs.nim','=',$nim)
//                 ->first();
//
//       return view('halkhs')->with('profils',$profils);
// }
      // $khs = DB::table('tbl_khs')
      //           ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
      //           ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
      //           ->where('tbl_mahasiswa.nim','=',$nim)
      //           ->get();
      //
      // $sks = DB::table('tbl_khs')
      //           ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
      //           ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
      //           ->where('tbl_mahasiswa.nim','=',$nim)
      //           ->select(DB::raw("SUM(sks) as total"))
      //           ->first();
      //
      // $ip = DB::table('tbl_khs')
      //           ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
      //           ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
      //           ->where('tbl_mahasiswa.nim','=',$nim)
      //           ->select(DB::raw("SUM(tbl_matakuliah.sks*tbl_khs.nilai) / SUM(tbl_matakuliah.sks) AS ip_semester"))
      //           ->first();
      //
      // $semester = DB::table('tbl_khs')
      //           ->where ('tbl_khs.semester', '=', '$semester')
      //           ->get();
      //
      // return view('halkhs')->with('profils',$profils);
      //           // return view('halkrs',['profils'=>$profil]);

  // }



  // public function tampilkanKhsSemester($semester){
  //   if(session()->has('nim')){
  //     $nim = session()->get('nim');
  //   }
  //     $profils = DB::table('tbl_khs')
  //               ->join('tbl_mahasiswa', 'tbl_khs.nim','=','tbl_mahasiswa.nim')
  //               ->where('tbl_khs.nim','=',$nim)
  //               ->first();
  //
  //     $datakhs = DB::table('tbl_khs')
  //               ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
  //               ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
  //               ->where('tbl_mahasiswa.nim','=',$nim)
  //               ->get();
  //
  //     $khs = DB::table('tbl_khs')
  //               ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
  //               ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
  //               ->where('tbl_mahasiswa.nim','=',$nim)
  //               ->get();
  //
  //     $sks = DB::table('tbl_khs')
  //               ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
  //               ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
  //               ->where('tbl_mahasiswa.nim','=',$nim)
  //               ->select(DB::raw("SUM(sks) as total"))
  //               ->first();
  //
  //     $ip = DB::table('tbl_khs')
  //               ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
  //               ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
  //               ->where('tbl_mahasiswa.nim','=',$nim)
  //               ->select(DB::raw("SUM(tbl_matakuliah.sks*tbl_khs.nilai) / SUM(tbl_matakuliah.sks) AS ip_semester"))
  //               ->first();
  //
  //     $semester = DB::table('tbl_khs')
  //               ->where ('tbl_khs.semester', '=', '$semester')
  //               ->get();
  //
  //     return view('halkhs')->with('profils',$profils)->with('khs',$khs)->with('sks',$sks)->with('ip',$ip);
  //               // return view('halkrs',['profils'=>$profil]);
  //
  // }

  // public function tampilkanPembantu(){
  //   // return "TESTING: ".$semester;
  //
  //
  // }
 //
 // public function tampilkanKhsSemester($semester){
 //            $semester = DB::table('tbl_khs')
 //                      ->where ('semester', '=', '$semester')
 //                      ->get();
 //
 //        return view('halkhs', ['tampilkanKhs']);
 //      }


    // public function showSemester(){
    //   if(session()->has('nim')){
    //     $nim = session()->get('nim');
    // }

  //   if (DB::tbl('tbl_khs')->where('nim',$nim))
  //
  }

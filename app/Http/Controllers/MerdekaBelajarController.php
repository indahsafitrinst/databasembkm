<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MerdekaBelajarController extends Controller
{

  public function statusMBKMchecking(){
    $cekstatuspermkonvkrs = DB::table('tbl_permohonanmbkm')->where('nim_mhs',session('nim'))
                          ->whereIn('status',[1,2])
                          ->first();
    // $countbaris = count($cekstatuspermkonvkrs);
    $cekstatuskonvnilai = DB::table('tbl_docskonvnilai')
                          ->join('tbl_mhsmbkm', 'tbl_docskonvnilai.id_mhsmbkm','=','tbl_mhsmbkm.id_mhsmbkm')
                          ->where('nim',session('nim'))
                          ->where('semester',session('semester'))
                          ->whereIn('status',[1,2])
                          ->first();
    // statusmbkm 1=nunggu penerimaan perm MBKM
    // statusmbkm 2 = perm mbkm diterima = ada tombol ajukan konv NILAI
    // statusmbkm 3 = nunggu terima konv NILAI
    // statusmbkm 4 = konv nilai diterima= ada tombol untuk liaht khs

    if(isset($cekstatuspermkonvkrs)){
      if($cekstatuspermkonvkrs->status==1){//menunggu acc perm mbkm
        return view('merdekabelajar',['statusmbkmmhs'=>1]);
      }else if($cekstatuspermkonvkrs->status==2){//mbkm  telah di acc
        if(isset($cekstatuskonvnilai)){
          if($cekstatuskonvnilai->status==1){//nunggu konv nilai di acc
            return view('merdekabelajar',['statusmbkmmhs'=>3]);
          }else if($cekstatuskonvnilai->status==2){//konv nilai dah di acc
            return view('merdekabelajar',['statusmbkmmhs'=>4]);
          }else if($cekstatuskonvnilai->status==3){//konv nilai ditolak. harus ajukan lagi
            return view('merdekabelajar',['statusmbkmmhs'=>2]);
          }
        }else{//belum ada ngasih konv nilai
          return view('merdekabelajar',['statusmbkmmhs'=>2]);
        }
        return view('merdekabelajar',['statusmbkmmhs'=>2]);
      }
    }else{//belum ada memberikan permohonan mbkm
      return view('merdekabelajar',['statusmbkmmhs'=>0]);
    }


    // if($cekstatuspermkonvkrs == true){
    //   if($cekstatuspermkonvkrs->status == 1){
    //     //sudah dikirim permohonannya tpi belom di acc
    //     $statuspermkonvkrs = 1;
    //     return view('merdekabelajar',['statusmbkmmhs'=>$statuspermkonvkrs]);
    //   }else if($cekstatuspermkonvkrs->status == 2){
    //     //diterima permohonannya
    //     $statuspermkonvkrs = 2;
    //     //cek status konvnilai
    //     if(isset($cekstatuskonvnilai)){
    //       if($cekstatuskonvnilai->status == 1){//konv nilai belom diacc
    //         return view('merdekabelajar',['statusmbkmmhs'=>3]);
    //
    //       }else if($cekstatuskonvnilai->status == 2){//konvnilai udh diacc
    //         return view('merdekabelajar',['statusmbkmmhs'=>4]);
    //       }else if($cekstatuskonvnilai->status == 3){//konvnilai ditolak
    //         return view('merdekabelajar',['statusmbkmmhs'=>2]);
    //       }
    //     }else{//termasuk konv nilai belum dikirim
    //       return view('merdekabelajar',['statusmbkmmhs'=>2]);
    //     }
    //   }else{
    //     $statuspermkonvkrs = 0;
    //     return view('merdekabelajar',['statusmbkmmhs'=>$statuspermkonvkrs]);
    //   }
    // }else{
    //   $statuspermkonvkrs = 0;
    //   return view('merdekabelajar',['statusmbkmmhs'=>$statuspermkonvkrs]);
    // }
  }
}
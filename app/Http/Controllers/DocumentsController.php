<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
  public function getDocuments($key_idpermohonan){
    $getdocuments = DB::table('daftar_permohonan_mbkm')
                    ->where('id_permohonan',$key_idpermohonan)
                    ->first();

    return view('pdfviewer',['documentget'=>$getdocuments]);

  }
}

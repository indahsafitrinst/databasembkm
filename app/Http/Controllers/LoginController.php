<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function logincek(){
      if(session()->has('nim') || session()->has('nip')){
        return redirect('/profil');
      }else{
        return view('loginmhs');
      }
    }


    public function mhslogin(Request $req){
      $datareq = $req->input();

      $data = DB::table('tbl_mahasiswa')
      ->join('tbl_prodi', 'tbl_mahasiswa.id_prodi', '=', 'tbl_prodi.id_prodi')
      ->where('nim', $req->nim)->first();
      if(!$data){
        return redirect('/loginmhs')->with('alert','NIM tidak ditemukan...Cek kembali NIM anda.')->with('cek','dikirim');
      }
      if($req->password = $data->password){
        $req->session()->put('nim', $data->nim);
        $req->session()->put('nama', $data->nama);
        $req->session()->put('email', $data->email);
        $req->session()->put('password', $data->password);
        $req->session()->put('stambuk', $data->stambuk);
        $req->session()->put('id_prodi', $data->id_prodi);
        $req->session()->put('nama_prodi', $data->nama_prodi);
        $req->session()->put('semester', $data->semester);
        return redirect('/profil');
      }
      return redirect('/loginmhs')->with('alert','Password anda salah!');
    }
    public function logincekmhs(){
      if(session()->has('nim')){
        return redirect('/profil');
      }else{
        return view('loginmhs');
      }
    }

    public function logincekdsn(){
      if(session()->has('nip')){
        return redirect('/profildsn');
      }else{
        return view('logindosen');
      }
    }


    public function dsnlogin(Request $req){
      $datareq = $req->input();

      $data = DB::table('tbl_dosen')
      ->where('nip', $req->nip)->first();
      if(!$data){
        return redirect('/logindosen')->with('alert','NIP tidak ditemukan...Cek kembali NIP anda.')->with('cek','dikirim');
      }
      if($req->password = $data->password){
        $req->session()->put('nip', $data->nip);
        $req->session()->put('nama_dosen', $data->nama_dosen);
        $req->session()->put('email', $data->email);
        $req->session()->put('password', $data->password);
        $req->session()->put('level', $data->level);
        return redirect('/profildsn');
      }
      return redirect('/logindosen')->with('alert','Password anda salah!');
    }



    public function logout(){
      if(session()->has('nim')){
        session()->forget('nim');
        session()->forget('nama');
        session()->forget('email');
        session()->forget('password');
        session()->forget('stambuk');
        session()->forget('id_prodi');
        session()->forget('nama_prodi');
        session()->forget('semester');
        session()->save();
        return redirect('/');
      }else if(session()->has('nip')){
        session()->forget('email');
        session()->forget('password');
        session()->forget('nip');
        session()->forget('nama_dosen');
        session()->forget('level');
        session()->save();
        return redirect('/logindosen');
      }else{
        return redirect('/');
      }

    }
}

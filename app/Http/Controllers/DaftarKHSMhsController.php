<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DaftarKHSMhsController extends Controller
{
      public function daftarKHSMhs(){
        DB::statement("SET SQL_MODE=''");
        $khsmhsmbkm = DB::table('khs_mhs_mbkm_3')
                      ->get();

        return view('daftarkhsmahasiswa', ['khsmhsmbkms'=>$khsmhsmbkm]);
      }

      public function tampilKhsSemester($semester){
        DB::statement("SET SQL_MODE=''");
        $semester = DB::table('khs_mhs_mbkm_3')
                      ->where ('semester','=', $semester)
                      ->get();

        return view('daftarkhsmahasiswa', ['khsmhsmbkms'=>$semester]);
      }

      public function tampilKhs($key_semester, $key_nim){
          $profil = DB::table('tbl_mahasiswa')
                    ->join('tbl_dosen','tbl_mahasiswa.nip_dosenpa','=','tbl_dosen.nip')
                    ->where('nim', '=', $key_nim)
                    ->first();

          $khs = DB::table('tbl_khs')
                    ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                    ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                    ->where('tbl_khs.nim',$key_nim)
                    ->where('tbl_khs.semester', '=', $key_semester)
                    ->get();

          $sks = DB::table('tbl_khs')
                    ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                    ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                    ->where('tbl_khs.nim',$key_nim)
                    ->where('tbl_khs.semester', '=', $key_semester)
                    ->select(DB::raw("SUM(sks) as total"))
                    ->first();

          $ip = DB::table('tbl_khs')
                    ->join('tbl_mahasiswa','tbl_khs.nim','=','tbl_mahasiswa.nim')
                    ->join('tbl_matakuliah','tbl_khs.kode_matakuliah','=','tbl_matakuliah.kode_matakuliah')
                    ->where('tbl_khs.nim','=',$key_nim)
                    ->where('tbl_khs.semester','=', $key_semester)
                    ->select(DB::raw("SUM(tbl_matakuliah.sks*tbl_khs.nilai) / SUM(tbl_matakuliah.sks) AS ip_semester"))
                    ->first();

          return view('detailkhsmhsmbkm')->with('profils',$profil)->with('khs',$khs)->with('sks',$sks)->with('ip',$ip);
        }

      public function search(Request $req)
        {
          DB::statement("SET SQL_MODE=''");
          $search = DB::table('khs_mhs_mbkm_3')
                    ->where('nama','LIKE','%'.$req->searchinput.'%')
                    ->orwhere('nim','LIKE','%'.$req->searchinput.'%')
                    ->get();
          return view('daftarkhsmahasiswa1', ['khsmhsmbkms'=>$search]);
      }
    }

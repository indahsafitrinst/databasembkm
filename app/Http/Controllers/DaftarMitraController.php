<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DaftarMitraController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
      return view('mitra.daftarmitra');
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('mitra.tambahmitra');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_mitra'     => 'required',
            'nama_mitra'   => 'required'
        ]);

        $mitra = DB::table('tbl_mitra')->insert([
          'kode_mitra' => $request->kode_mitra,
          'nama_mitra' => $request->nama_mitra
        ]);

        if($mitra){   
          return redirect()->route('mitra.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
          return redirect()->route('mitra.index')->with(['error' => 'Data Gagal Disimpan!']);          
        }
    }
    
    /**
     * edit
     *
     * @param  mixed $mitra
     * @return void
     */

  public function edit($kode_mitra)
    {
      $mitra = DB::table('tbl_mitra')->where('kode_mitra', $kode_mitra)->get();
      return view('mitra.editmitra',['tbl_mitra' => $mitra]);
    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $mitra
     * @return void
     */

     
    public function update(Request $request)
    {
      $this->validate($request, [
        'kode_mitra'       => 'required',
        'nama_mitra'     => 'required'
      ]);

      
      $mitra = DB::table('tbl_mitra')->where('kode_mitra', $request->kode_mitralama)->update([
        'kode_mitra' => $request->kode_mitra,
        'nama_mitra' => $request->nama_mitra
      ]);
      
      if($mitra){   
        return redirect()->route('mitra.index')->with(['success' => 'Data Berhasil Diedit!']);
    }else{          
        return redirect()->route('mitra.index')->with(['error' => 'Data Gagal Diedit!']);
    }
    }

    /**
     * destroy
     *
     * @param  mixed $kode_mitra
     * @return void
     */
    
    public function destroy($id){
      $mitra = DB::table('tbl_mitra')->where('kode_mitra',$id)->delete();
      if($mitra){   
          return redirect()->route('mitra.index')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{          
          return redirect()->route('mitra.index')->with(['error' => 'Data Gagal Dihapus!']);
      }
  }
  public function search(Request $request)
    {
        $cari = $request->cari;
        $mitra = DB::table('tbl_mitra')->where('nama_mitra', 'like', "%" . $cari . "%");
        return view('mitra.daftarmitra', ['tbl_mitra' => $mitra]);
    }
  } 



<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function showAllKategori(){
        //mengatur item dalam 1 halaman
        $kategori = kategori::paginate(5);
        return view('kategori', compact('kategori'));
    }


    public function showBarangList($id){
        kategori::find($id);
        $barang = DB::table('barangs')
                         ->where('kategori_id','=', $id)
                         ->orderBy('kategori_id')
                         ->get();
        return view('barangList', compact('barang'));
    }
}

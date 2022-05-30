<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class barangController extends Controller
{
    public function showAllBarang(){
        //mengatur item dalam 1 halaman
        $barang = barang::all();
        return view('barangList', compact('barang'));
    }

    public function showInsertBarangPage(){
        return view('insert');
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $barang = barang::where('name', 'LIKE', "%$keyword%")->paginate(3)->appends(array('keyword' => $keyword));
        return view('barangList', compact('barang'));
    }



    public function insert(Request $request){
        $rules = [
            'barang_name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'kategori' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back() -> withErrors($validator->errors());
        }
        $barang = new barang();
        $barang->name = $request->barang_name;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        // $barang->kategori_id = $request->kategori;
        $category = kategori::get();
        foreach($category as $category){
            if($category->name === $request->kategori){
                $barang->kategori_id = $category->id;
            }
        }

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $barang['image']= $filename;
        }
        $barang->save();
        return redirect('/barangList');
    }

    public function showUpdateBarangPage($id){
        $barang = barang::find($id);
        return view('update', compact('barang'));
    }

    public function update(Request $request, $id){
        $barang = barang::find($id);
        $barang->name = $request->name;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $category = kategori::get();
        foreach($category as $category){
            if($category->name === $request->kategori){
                $barang->kategori_id = $category->id;
            }
        }
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $barang['image']= $filename;
        }
        $barang->save();
        return redirect()->action([KategoriController::class, 'showBarangList'],['id' => $id]);
    }

    public function delete($id){
        $barang = barang::find($id);
        $barang->delete();
        return back();
    }
}

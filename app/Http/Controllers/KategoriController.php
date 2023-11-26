<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\kategori;
use Carbon\carbon;

use Hash;
use Auth;
use File;

class KategoriController extends Controller
{
    public function daftar(){
        $kategori = kategori::orderBy('created_at','desc')->get();
        return view('admin.pages.kategori.daftar',['kategori' => $kategori]);
    }
    public function save(Request $request){
        $validated=$request->validate([
            'nama_kategori'=>'required',
        ]);
        $nama_kategori=$request->input('nama_kategori');
        kategori::create([
            'nama_kategori'=>$nama_kategori,
        ]);
        return redirect()->route('admin.kategori.daftar')->with('added','Kategori telah ditambahkan');
    }
    public function update($id_kategori, Request $request){
        $kategori = kategori::findOrFail($id_kategori);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();
        return redirect()->back()->with('updated','Kategori telah diupdate');
    }
    public function delete($id_kategori){
        $kategori = kategori::find($id_kategori);
        $kategori->delete();
        return redirect()->back()->with('deleted','Kategori telah dihapus');
    }
}

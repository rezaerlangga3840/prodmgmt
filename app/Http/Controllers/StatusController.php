<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\status;
use Carbon\carbon;

use Hash;
use Auth;
use File;

class StatusController extends Controller
{
    public function daftar(){
        $status = status::orderBy('created_at','desc')->get();
        return view('admin.pages.status.daftar',['status' => $status]);
    }
    public function save(Request $request){
        $validated=$request->validate([
            'nama_status'=>'required',
        ]);
        $nama_status=$request->input('nama_status');
        status::create([
            'nama_status'=>$nama_status,
        ]);
        return redirect()->route('admin.status.daftar')->with('added','Status telah ditambahkan');
    }
    public function update($id_status, Request $request){
        $status = status::findOrFail($id_status);
        $status->nama_status = $request->input('nama_status');
        $status->save();
        return redirect()->back()->with('updated','Status telah diupdate');
    }
    public function delete($id_status){
        $status = status::find($id_status);
        $status->delete();
        return redirect()->back()->with('deleted','Status telah dihapus');
    }
}

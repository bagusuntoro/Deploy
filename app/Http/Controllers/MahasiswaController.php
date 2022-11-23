<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        $data = Mahasiswa::all();
         
        return view('mahasiswa/dataMahasiswa', compact('data'));
    }

    public function insertMahasiswa(){
        $data = Mahasiswa::all();

        return view('mahasiswa/insertMahasiswa');
    }

    public function addMahasiswa(Request $request){
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Input');
    }

    public function tampilDataMahasiswa($id){
        $data = Mahasiswa::find($id);

        return view('mahasiswa/updateMahasiswa', compact('data'));
    }
    
    public function updateDataMahasiswa(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Update');
    }
    
    public function daleteMahasiswa($id){
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Delete');
    }
}

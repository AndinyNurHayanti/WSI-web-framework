<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    
    public function index($nama){
    return $nama;
    }
    // public function index(Request $request){
    //     return $request->segment(2);
    // }
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request)
    {
        $messages = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
            'string' => 'Input :attribute harus berupa teks!',
        ];

        // Validasi input
        $request->validate([
            'nama' => 'required|min:5|max:20|string',
            'alamat' => 'required|string',
        ], $messages);

        // Ambil data input
        $nama = $request->input('nama');
        $alamat = $request->input('alamat'); // Perbaikan titik koma

        return "Nama: " . $nama . ", Alamat: " . $alamat;
    }
}

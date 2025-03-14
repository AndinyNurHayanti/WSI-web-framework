<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
{ 
    $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
    return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
}


    public function create()
    {
        $pengalaman_kerja = null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    public function store(Request $request)
    {

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data pengalaman_kerja baru telah berhasil disimpan.');
    }
}
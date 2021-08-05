<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DataKehutanan;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class DataKehutananController extends Controller
{
    public function index()
    {
        $data = DataKehutanan::orderBy('nama_dokumen', 'asc')->get();
        $kategori = KategoriDokumen::orderBy('nama_kategori', 'asc')->get();
        return view('layouts.web.content.data_kehutanan', compact('data', 'kategori'));
    }

    public function show($id)
    {
        $data = DataKehutanan::find($id);
        return view('layouts.web.content.file_dokumen', compact('data'));
    }

    public function searchByKategori(Request $request)
    {
        $id = $request->id_kategori;
        $data['hasil'] = DataKehutanan::where('id_kategori','like', '%'.$id.'%')->get();
        return json_encode($data);
    }
}

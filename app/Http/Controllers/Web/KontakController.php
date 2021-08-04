<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('layouts.web.content.kontak');
    }

    public function store(Request $request)
    {
        Pengaduan::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'subjek'    => $request->subjek,
            'isi_pesan' => $request->isi_pesan
        ]);
        return redirect()->route('web.kontak')->with('success', 'Pengaduan telah dikirim');
    }
}

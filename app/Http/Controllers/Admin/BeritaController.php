<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('layouts.admin.content.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.content.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $berita = new Berita;
        $file = $request->hasFile('gambar_berita');
        if ($file) {
            $file = $request->file('gambar_berita');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'admin/images/gambar_berita';
            $file->move($tujuan_upload, $nama_file);
            $berita->gambar_berita = $nama_file;
        }
        $berita->judul_berita = $request->judul_berita;
        $berita->slug_judul = Str::slug($request->judul_berita, '-');
        $berita->isi_berita = $request->isi_berita;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('layouts.admin.content.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $file = $request->hasFile('gambar_berita');
        if ($file) {
            $file = $request->file('gambar_berita');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'admin/images/gambar_berita';
            $image_path = public_path('admin/images/gambar_berita/' . $berita->gambar_berita);
            if (File::exists($image_path)) {
                $e =  File::delete($image_path);
            }
            $file->move($tujuan_upload, $nama_file);
            $berita->gambar_berita = $nama_file;
        }
        $berita->judul_berita = $request->judul_berita;
        $berita->slug_judul = Str::slug($request->judul_berita, '-');
        $berita->isi_berita = $request->isi_berita;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $image_path = public_path('admin/images/gambar_berita/' . $berita->gambar_berita);
        if (File::exists($image_path)) {
            $e =  File::delete($image_path);
        }
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Data telah dihapus.');
    }
}

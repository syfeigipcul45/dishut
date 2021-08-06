<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlideGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideGambarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = SlideGambar::all();
        return view('layouts.admin.content.slide-gambar.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new SlideGambar();
        $file = $request->hasFile('file_gambar');
        if ($file) {
            $file = $request->file('file_gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = public_path('web/slide-gambar');
            $file->move($tujuan_upload, $nama_file);
            $slide->file_gambar = $nama_file;
            $slide->save();
        }
        return redirect()->route('slide.index')->with('success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $slide = SlideGambar::find($id);
        $file = $request->hasFile('file_gambar');
        if ($file) {
            $file = $request->file('file_gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = public_path('web/slide-gambar');

            $image_path = public_path('web/slide-gambar/' . $slide->file_gambar);
            if (File::exists($image_path)) {
                $e =  File::delete($image_path);
            }

            $file->move($tujuan_upload, $nama_file);
            $slide->file_gambar = $nama_file;
            $slide->save();
        }
        return redirect()->route('slide.index')->with('success', 'Gambar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = SlideGambar::find($id);
        $image_path = public_path('web/slide-gambar/' . $slide->file_gambar);
        if (File::exists($image_path)) {
            $e =  File::delete($image_path);
        }
        $slide->delete();
        return redirect()->route('slide.index')->with('success', 'Data telah dihapus.');
    }

    public function edit_gambar(Request $request)
    {
        $id = $request->id;
        return view('layouts.admin.content.slide-gambar.edit', compact('id'));
    }
}

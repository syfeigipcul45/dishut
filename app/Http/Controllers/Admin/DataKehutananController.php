<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKehutanan;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DataKehutananController extends Controller
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
        $data = DB::table('tabel_data_kehutanan')
            ->join('tabel_kategori_dokumen', 'tabel_data_kehutanan.id_kategori', '=', 'tabel_kategori_dokumen.id')
            ->select(
                'tabel_data_kehutanan.id',
                'tabel_data_kehutanan.nama_dokumen',
                'tabel_data_kehutanan.file_dokumen',
                'tabel_data_kehutanan.id_kategori',
                'tabel_kategori_dokumen.nama_kategori'
            )
            ->orderBy('tabel_data_kehutanan.nama_dokumen', 'asc')
            ->get();
        $kategori = KategoriDokumen::orderBy('nama_kategori', 'asc')->get();
        return view('layouts.admin.content.data-kehutanan.index', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.content.data-kehutanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file_dokumen');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = public_path('data-kehutanan');
        $file->move($tujuan_upload, $nama_file);

        $data = new DataKehutanan();
        $data->id_kategori = $request->id_kategori;
        $data->nama_dokumen = $request->nama_dokumen;
        $data->file_dokumen = $nama_file;
        $data->save();

        return redirect()->route('data-kehutanan.index')->with('success', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataKehutanan::where('id',$id)->first();
        return view('layouts.admin.content.data-kehutanan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        $id = $request->id;
        return view('layouts.admin.content.data-kehutanan.edit', compact('id'));
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
        $data = DataKehutanan::where('id',$id)->first();
        $upload = $request->hasFile('file_dokumen_edit');
        if ($upload) {
            $file = $request->file('file_dokumen_edit');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = public_path('data-kehutanan');
            $file_path = public_path('data-kehutanan/' . $data->file_dokumen);
            if (File::exists($file_path)) {
                $e = File::delete($file_path);
            }
            $file->move($tujuan_upload, $nama_file);
            $data->file_dokumen = $nama_file;
        }
        $data->id_kategori = $request->id_kategori_edit;
        $data->nama_dokumen = $request->nama_dokumen_edit;
        $data->save();

        return redirect()->route('data-kehutanan.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataKehutanan::find($id);
        $file_path = public_path('data-kehutanan/' . $data->file_dokumen);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $data->delete();
        return redirect()->route('data-kehutanan.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function searchByKategori($request)
    {
        $id = $request->id;
        $data['hasil'] = DataKehutanan::where('id_kategori', $id)->get();
        return json_encode($data);
    }
}

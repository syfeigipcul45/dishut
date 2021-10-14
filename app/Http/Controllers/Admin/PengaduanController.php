<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
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
    
    public function index()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('layouts.admin.content.pengaduan.index', compact('pengaduan'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('id',$id)->first();
        return view('layouts.admin.content.pengaduan.show', compact('pengaduan'));
    }
}

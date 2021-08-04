<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Profil;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($slug)
    {
        $data = Menu::where('slug_sub_menu', $slug)->first();
        return view('layouts.web.content.sub_menu', compact('data'));
    }

    public function show_bidang($slug)
    {
        $data = Menu::where('slug_sub_menu', $slug)->first();
        return view('layouts.web.content.sub_menu', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view ('admin/index');
    }
    public function table(){
        return view ('admin/table');
    }
    public function artist(){
        return view ('admin/artist');
    }
    public function albums(){
        return view ('admin/albums');
    }
    public function song(){
        return view ('admin/song');
    }
}

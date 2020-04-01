<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('musicon/albums');
    }
    public function albums(){
        return view('musicon/albums');
    }
    public function events(){
        return view('musicon/events');
    }
    public function news(){
        return view('musicon/news');
    }
    public function contacts(){
        return view('musicon/contacts');
    }
    public function elements(){
        return view('musicon/elements');
    }
    public function login(){
        return view('musicon/login');
    }
    public function register(){
        return view('musicon/register');
    }
}

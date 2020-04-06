<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('musicon/login');
    }
    public function register(){
        return view('musicon/register');
    }
    public function information(){
        return view('musicon/information');
    }
}

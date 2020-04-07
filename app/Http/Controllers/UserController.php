<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function information(){
        return view('musicon/information', [
            'title' => 'User\'s profile | The Musicon'
        ]);
    }
}

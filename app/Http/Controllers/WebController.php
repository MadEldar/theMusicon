<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Mail\VerifyEmail;
use App\Token;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function home() {
        return view('musicon/index', [
            'title' => 'Home | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function albums() {
        return view('musicon/albums', [
            'title' => 'Albums | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function events() {
        return view('musicon/events', [
            'title' => 'Events | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function news() {
        return view('musicon/news', [
            'title' => 'News | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function contacts() {
        return view('musicon/contacts', [
            'title' => 'Contact | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function elements() {
        return view('musicon/elements', [
            'title' => 'Elements | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function sign_in_view() {
        return view('musicon/sign-in', [
            'title' => 'Sign in | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }
    public function sign_up_view() {
        return view('musicon/sign-up', [
            'title' => 'Sign up | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }

    public function sign_up(UserCreateRequest $req) {
        $req->validate([]);
        $user = User::create([
            'user_email' => $req->get('user_email'),
            'first_name' => $req->get('first_name'),
            'last_name' => $req->get('last_name'),
            'password' => $req->get('password')
        ]);
        $token = Token::create([
            'user_id' => $user['id'],
            'token' => Str::random(60),
            'usage' => 0
        ]);
        Mail::to($user['user_email'])->send(new VerifyEmail($user, $token));
        return redirect('/sign-in')->with('message', [
            'content' => 'Complete your registration by confirming your email',
            'type' => 'success'
        ]);
    }
}

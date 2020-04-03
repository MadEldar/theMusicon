<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Mail\VerifyEmail;
use App\Spotify;
use App\Token;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function home() {
//        dd(Spotify::new_albums());
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

    public function sign_in(SignInRequest $req) {
        $req->validate([]);
        $user = User::where('user_email', $req->get('user_email'))->first();
        Auth::login($user);
        return redirect('/')->with('message', [
            'type' => 'success',
            'content' => "Welcome back, $user->first_name"
        ]);
    }

    public function sign_up_view() {
        return view('musicon/sign-up', [
            'title' => 'Sign up | The Musicon',
            'message' => Session::get('message') ?? null
        ]);
    }

    public function sign_up(SignUpRequest $req) {
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

    public function verify($token) {
        $db_token = Token::where('token', $token)->first();
        if (isset($db_token) && $db_token->usage == 0) {
            $user = User::find($db_token->user_id)->update(['user_status' => 2]);
            Token::find($db_token->id)->delete();
            return redirect('/sign-in')
                ->with('message', [
                'type' => 'success',
                'content' => 'User verification suceeded'
            ]);
        } else if (isset($db_token) && $db_token->usage != 0) {
            return redirect('/sign-in')
                ->withErrors(['wrong_token' => 'Token has no effect']);
        } else {
            return redirect('/sign-in')
                ->withErrors(['wrong_token' => 'Cannot find token or token has already been used']);
        }
    }
}

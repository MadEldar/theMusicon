<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Mail\VerifyEmail;
use App\Spotify;
use App\Token;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function home() {
        if (!Cache::has('home')) {
            $cache = [];
            $access_token = Spotify::get_access_token();
            $cache['albums'] = Spotify::new_albums(10, 0, $access_token)->albums->items;
            $cache['tracks'] = Spotify::get_top('artists', 12, 0, $access_token)->tracks;
            $cache['new_track'] = Spotify::get_track(null, true, $access_token);
            $cache['new_releases'] = Spotify::new_releases(6, 0, $access_token)->albums->items;
            $cache['top_tracks'] = Spotify::get_top('tracks', 6, 0, $access_token)->tracks;
            $cache['top_artists'] = Spotify::get_top('artists', 6, 0, $access_token)->tracks;
            Cache::put('home', $cache, Carbon::now()->addHours(4));
        }
        $cache = Cache::get('home');
        return view('musicon/index', [
            'title' => 'Home | The Musicon',
            'albums' => $cache['albums'],
            'tracks' => $cache['tracks'],
            'new_track' => $cache['new_track'],
            'new_releases' => $cache['new_releases'],
            'top_tracks' => $cache['top_tracks'],
            'top_artists' => $cache['top_artists'],
        ]);
    }
    public function artists() {
        if (!isset($_GET['q'])) $_GET['q'] = 'all';
        if ($_GET['q'] != 'all') {
            $artists = Spotify::search($_GET['q'], 'artist', 18, 0)->artists->items;
        } else {
            $artists = array_map(
                fn($track) => $track->artists[0],
                Spotify::get_top('artists', 18, 0)->tracks
            );
            $unique = array_unique(array_map(fn($artist) => $artist->id, $artists));
            $artists = Spotify::get_artists($unique)->artists;
        }
        return view('musicon/artists', [
            'title' => 'Artists | The Musicon',
            'artists' => $artists
        ]);
    }
    public function more_artists(Request $req) {
        if ($req->get('q') != 'all') {
            $artists = Spotify::search($req->get('q'), 'artist', 18, $req->get('offset'))->artists->items;
        } else {
            $artists = array_map(
                fn($track) => $track->artists[0],
                Spotify::get_top('artists', 18, $req->get('offset'))->tracks
            );
            $unique = array_unique(array_map(fn($artist) => $artist->id, $artists));
            $artists = Spotify::get_artists($unique)->artists;
        }
        return $artists;
    }
    public function albums() {
        if (!isset($_GET['q'])) $_GET['q'] = 'all';
        $albums = $_GET['q'] != 'all' ?
            Spotify::search($_GET['q'], 'album', 18, 0)->albums->items :
            Spotify::new_albums(18, 0)->albums->items;
        return view('musicon/albums', [
            'title' => 'Albums | The Musicon',
            'albums' => $albums
        ]);
    }
    public function more_albums(Request $req) {
        return $req->get('q') != 'all'?
            Spotify::search($req->get('q'), 'album', 18, $req->get('offset'))->albums->items :
            Spotify::new_albums(18, $req->get('offset'))->albums->items;
    }

    public function events() {
        return view('musicon/events', [
            'title' => 'Events | The Musicon',
        ]);
    }
    public function news() {
        return view('musicon/news', [
            'title' => 'News | The Musicon',
        ]);
    }
    public function contacts() {
        return view('musicon/contacts', [
            'title' => 'Contact | The Musicon',
        ]);
    }
    public function elements() {
        return view('musicon/elements', [
            'title' => 'Elements | The Musicon',
        ]);
    }
    public function artist() {
        return view('musicon/artist', [
            'title' => 'Artist | The Musicon'
        ]);
    }

    public function sign_in_view() {
        return view('musicon/sign-in', [
            'title' => 'Sign in | The Musicon',
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
            'content' => 'Complete your registration by verifying your email',
            'type' => 'success'
        ]);
    }

    public function sign_out() {
        Auth::logout();
        return redirect()->back();
    }

    public function verify($token) {
        $db_token = Token::where('token', $token)->first();
        if (isset($db_token) && $db_token->usage == 0) {
            $user = User::find($db_token->user_id)->update([
                'user_status' => 2,
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);
            Token::find($db_token->id)->delete();
            return redirect('/sign-in')
                ->with('message', [
                'type' => 'success',
                'content' => 'User verification succeeded'
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

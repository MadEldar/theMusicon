<?php

namespace App\Http\Controllers;

use App\Genius;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\LastFM;
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
            $cache['albums'] = Spotify::new_releases(10, 0, $access_token)->albums->items;
            $cache['tracks'] = Spotify::get_top('artists', 12, 0, $access_token)->tracks;
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
            'new_track' => Spotify::find_track(null, true),
            'new_releases' => $cache['new_releases'],
            'top_tracks' => $cache['top_tracks'],
            'top_artists' => $cache['top_artists'],
        ]);
    }
    public function genres() {
        if (!isset($_GET['q'])) return redirect()->back()->withErrors(['Please select a genre first']);
        $tracks = Spotify::get_genre_tracks($_GET['q'], 24)->tracks;
        return view('musicon/genres', [
            'title' => 'Genres | The Musicon',
            'tracks' => $tracks,
            'genres' => Spotify::get_all_genres()->genres
        ]);
    }
    public function more_genres(Request $req) {
        return Spotify::get_genre_tracks($req->get('q'), 24, $req->get('offset'))->tracks;
    }
    public function artists() {
        if (!isset($_GET['q'])) $_GET['q'] = 'all';
        if ($_GET['q'] != 'all') {
            $artists = Spotify::search($_GET['q'], 'artist', 24, 0)->artists->items;
        } else {
            $artists = array_map(
                fn($track) => $track->artists[0],
                Spotify::get_top('artists', 24, 0)->tracks
            );
            $unique = array_unique(array_map(fn($artist) => $artist->id, $artists));
            $artists = Spotify::get_artists($unique)->artists;
        }
        return view('musicon/artists', [
            'title' => 'Artists | The Musicon',
            'artists' => $artists
        ]);
    }
    public function artist($id) {
        $artistS = Spotify::find_artist($id);
        $artistL = LastFM::find_artist($artistS->name);
        $artistL = isset($artistL->error) ? null : $artistL->artist;
        $tracks = Spotify::find_artist_track($id)->tracks;
        $albums = Spotify::find_artist_album($id)->items;
        $unique = array_unique(array_map(fn($album) => $album->name, $albums));
        foreach ($albums as $key=>$album) {
            if (!isset($unique[$key])) unset($albums[$key]);
        }
        return view('musicon/artist-info', [
            'title' => $artistS->name . ' | The Musicon',
            'artistS' => $artistS,
            'artistL' => $artistL,
            'tracks' => $tracks,
            'albums' => $albums,
            'genres' => array_intersect($artistS->genres, Spotify::get_all_genres()->genres)
        ]);
    }
    public function more_artists(Request $req) {
        if ($req->get('q') != 'all') {
            $artists = Spotify::search($req->get('q'), 'artist', 24, $req->get('offset'))->artists->items;
        } else {
            $artists = array_map(
                fn($track) => $track->artists[0],
                Spotify::get_top('artists', 24, $req->get('offset'))->tracks
            );
            $unique = array_unique(array_map(fn($artist) => $artist->id, $artists));
            $artists = Spotify::get_artists($unique)->artists;
        }
        return $artists;
    }
    public function albums() {
        if (!isset($_GET['q'])) $_GET['q'] = 'all';
        $albums = $_GET['q'] != 'all' ?
            Spotify::search($_GET['q'], 'album', 24, 0)->albums->items :
            Spotify::new_releases(24, 0)->albums->items;
        return view('musicon/albums', [
            'title' => 'Albums | The Musicon',
            'albums' => $albums
        ]);
    }
    public function more_albums(Request $req) {
        return $req->get('q') != 'all'?
            Spotify::search($req->get('q'), 'album', 24, $req->get('offset'))->albums->items :
            Spotify::new_releases(24, $req->get('offset'))->albums->items;
    }
    public function redirect_album() {
        $track = Spotify::find_album($_GET['q'])->items[0];
        return redirect('/player?track='.urlencode($track->name.' '.$track->artists[0]->name));
    }
    public function player() {
        $from = stripos($_GET['track'], 'from');
        $query =  $from? substr($_GET['track'], 0, $from) : $_GET['track'];
        $track = Spotify::search($query, 'track', 1)->tracks->items;
        if ($track == []) return redirect()->back()->withErrors(['Could find song in the database']);
        $track = $track[0];
        $artist = Spotify::find_artist($track->artists[0]->id);
        $lyrics_search = Genius::search($track->name, $track->artists[0]->name)->response->hits;
        if ($lyrics_search == []) $lyrics = '';
        else $lyrics = Genius::find_track($lyrics_search[0]->result->id)->response->song->embed_content;
        $genres = array_intersect($artist->genres, Spotify::get_all_genres()->genres);
        $genre = ($genres != []) ? $genres[array_key_first($genres)] : 'None';
        $same_genre = Spotify::get_genre_tracks($genre)->tracks;
        $same_artist = Spotify::find_artist_track($artist->id)->tracks;
        return view('musicon/player-music', [
            'title' => "$track->name | The Musicon",
            'track' => $track,
            'lyrics' => $lyrics,
            'artist' => $artist,
            'genre' =>  $genre,
            'same_genre' => $same_genre,
            'same_artist' => $same_artist,
        ]);
    }
    public function more_lyrics(Request $req) {
        $lyrics_search = Genius::search($req->get('track'), $req->get('artist'))->response->hits;
        if ($lyrics_search == []) $lyrics = '';
        else $lyrics = Genius::find_track($lyrics_search[$req->get('index')]->result->id)->response->song->embed_content;
        return $lyrics;
    }

    public function search() {
        $result = Spotify::search($_GET['q'], null, 12);
        return view('musicon/search', [
            'title' => 'Searching for '. $_GET['q'] . ' | The Musicon',
            'albums' => $result->albums->items,
            'artists' => $result->artists->items,
            'tracks' => $result->tracks->items,
        ]);
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

    public function sign_in_view() {
        return view('musicon/sign-in', [
            'title' => 'Sign in | The Musicon',
        ]);
    }

    public function sign_in(SignInRequest $req) {
        $req->validate([]);
        $user = User::where('user_email', $req->get('user_email'))->first();
        if ($user->password != $req->get('password')) return redirect('/sign-in')->withErrors(['Incorrect password']);
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
        return redirect()->back()->with('message', [
            'type' => 'success',
            'content' => 'Signed out successfully',
        ]);
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

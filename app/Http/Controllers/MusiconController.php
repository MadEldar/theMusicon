<?php

namespace App\Http\Controllers;

use App\Spotify;
use Illuminate\Http\Request;

class MusiconController extends Controller
{
    public function search() {
        $scopes = 'user-read-private user-read-email';
        $client = [
            'clientId' => 'acce4313959e4859affc19f105c6acdf',
            'clientSecret' => '1a28ed102e824cb384499fe06e770ab8',
        ];
        $response = Spotify::search(
            'https://api.spotify.com/v1/search',
            [
                'q' => $_GET['q'] ?? 'The pretty reckless',
                'type' => $_GET['type'] ?? implode(',', Spotify::search_types),
                'grant_type' => 'client_credentials'
            ]
        );
        dd($response);
    }
}

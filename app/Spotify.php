<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spotify extends Model
{
    const search_types = [
        'album',
        'artist',
        'playlist',
        'track'
    ];

    private static function get_access_token() {
        $client_id = 'acce4313959e4859affc19f105c6acdf';
        $client_secret = '1a28ed102e824cb384499fe06e770ab8';

        $options = array(
            CURLOPT_URL => 'https://accounts.spotify.com/api/token',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)),
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        return json_decode(curl_exec($ch))->access_token;
    }

    public static function search($url, $data) {
        $access_token = Spotify::get_access_token();
        $options = array(
            CURLOPT_URL => "$url?" . http_build_query($data),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer $access_token"],
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $content = json_decode(curl_exec($ch));

        curl_close($ch);

        return $content;
    }
}

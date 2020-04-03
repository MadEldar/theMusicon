<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spotify extends Model
{
    private const search_types = [
        'album',
        'artist',
        'playlist',
        'track'
    ];
    private const scopes = [
        'arc'       => 'app-remote-control',
        'pmPrivate' => 'playlist-modify-private',
        'pmPublic'  => 'playlist-modify-public',
        'prc'       => 'playlist-read-collaborative',
        'prp'       => 'playlist-read-private',
        'stream'    => 'streaming',
        'ufm'       => 'user-follow-modify',
        'ufr'       => 'user-follow-read',
        'uiu'       => 'ugc-image-upload',
        'ulm'       => 'user-library-modify',
        'ulr'       => 'user-library-read',
        'umps'      => 'user-modify-playback-state',
        'urcp'      => 'user-read-currently-playing',
        'ure'       => 'user-read-email',
        'urp'       => 'user-read-private',
        'urpp'      => 'user-read-playback-position',
        'urps'      => 'user-read-playback-state',
        'urrp'      => 'user-read-recently-played',
        'utr'       => 'user-top-read',
    ];
    private const seeds = [
        'artists' => [
            '2xvW7dgL1640K8exTcRMS4',
            '6M2wZ9GZgrQXHCFfjv46we',
            '6ZNAsA4h8V7SOLtiK8Vfav',
            '1LEtM3AleYg1xabW6CRkpi',
            '3Nrfpe0tUJi4K4DXYWgMUX'
        ],
        'tracks' => [
            '7eJMfftS33KTjuF7lTsMCx',
            '1503Da6qbgNifRnRwIjtZe',
            '2qG81jL9UIP54uS8gYyP4k',
            '1raaNykBg1bDnWENUiglUA',
            '4bCuBkeVRofawnFkGu05fu'
        ]
    ];

    /**
     * @param $scopes array Array of scopes
     */
    private static function get_scopes($scopes) {
        return implode(' ', array_map(fn($scope) => Spotify::scopes[$scope], $scopes));
    }

    public static function get_access_token($scopes = null, $response_type = null) {
        $client_id = 'acce4313959e4859affc19f105c6acdf';
        $client_secret = '1a28ed102e824cb384499fe06e770ab8';

        $query = ($scopes != null || $response_type != null) ? ("?".
            ($response_type ? "response_type=$response_type" : '').
            "&client_id=adaaf209fb064dfab873a71817029e0d".
            ($scopes ? '&scopes='.urlencode(self::get_scopes($scopes)) : '').
            '&redirect_uri=https://developer.spotify.com/documentation/web-playback-sdk/quick-start/'
        ) : '';

        $options = [
            CURLOPT_URL => "https://accounts.spotify.com/api/token$query",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => ['Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret)],
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $access_token = json_decode(curl_exec($ch))->access_token;
        curl_close($ch);
        return $access_token;
    }

    private static function m_curl_exec($url) {
        $access_token = self::get_access_token();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                'Accept: application/json',
                'Content-Type: application/json'
            ],
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $options);
//        dd($options);
        $content = json_decode(curl_exec($ch));
        curl_close($ch);
        return $content;
    }

    public static function search($q, $type) {
        $query = http_build_query([
            'q' => $q,
            'type' => $type ?? implode(',', Spotify::search_types),
            'grant_type' => 'client_credentials'
        ]);
        $url = 'https://api.spotify.com/v1/search';

        return self::m_curl_exec("$url?$query");
    }

    /**
     * @param $type string Between artists, genres and tracks
     * @param $limit int Numer of items
     */
    public static function get_top($type, $limit = 10) {
        $query = http_build_query([
            'limit' => $limit,
            'market' => 'US',
            "seed_$type" => implode(',', self::seeds[$type]),
        ]);
        $url = "https://api.spotify.com/v1/recommendations?$query&min_energy=0.4&min_popularity=50";

        return self::m_curl_exec($url);
    }

    public static function new_albums($offset = 0, $limit = 10) {
        $url = "https://api.spotify.com/v1/browse/new-releases?offset=$offset&limit=$limit";
        return self::m_curl_exec($url);
    }

    public static function get_track($id) {
        $url = "https://api.spotify.com/v1/tracks/$id";

        return self::m_curl_exec($url);
    }
}

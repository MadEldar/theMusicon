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
    const scopes = [
        'uiu' => 'ugc-image-upload',
        'urps' => 'user-read-playback-state',
        'umps' => 'user-modify-playback-state',
        'urcp' => 'user-read-currently-playing',
        'stream' => 'streaming',
        'arc' => 'app-remote-control',
        'ure' => 'user-read-email',
        'urp' => 'user-read-private',
        'prc' => 'playlist-read-collaborative',
        'pmPublic' => 'playlist-modify-public',
        'prp' => 'playlist-read-private',
        'pmPrivate' => 'playlist-modify-private',
        'ulm' => 'user-library-modify',
        'ulr' => 'user-library-read',
        'utr' => 'user-top-read',
        'urpp' => 'user-read-playback-position',
        'urrp' => 'user-read-recently-played',
        'ufr' => 'user-follow-read',
        'ufm' => 'user-follow-modify',
    ];
    const seeds = [
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

    private static function get_access_token() {
        $client_id = 'acce4313959e4859affc19f105c6acdf';
        $client_secret = '1a28ed102e824cb384499fe06e770ab8';

        $options = [
            CURLOPT_URL => 'https://accounts.spotify.com/api/token',
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

    public static function m_curl_exec($url) {
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
     * @param $scopes array Array of scopes
     */
    public static function get_scopes($scopes) {
        return implode(' ', array_map(fn($scope) => Spotify::scopes[$scope], $scopes));
    }

    /**
     * @param $type string Between artists, genres and tracks
     * @param $limit int Numer of items
     */
    public static function get_top($type, $limit) {
        $query = http_build_query([
            'limit' => $limit,
            'market' => 'US',
            "seed_$type" => implode(',', self::seeds[$type]),
        ]);
        $url = "https://api.spotify.com/v1/recommendations?$query&min_energy=0.4&min_popularity=50";

        return self::m_curl_exec($url);
    }

    public static function new_albums() {
        $url = 'https://api.spotify.com/v1/browse/new-releases';

        return self::m_curl_exec($url);
    }
}

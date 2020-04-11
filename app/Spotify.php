<?php

namespace App;

class Spotify
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
        ],
        'genres' => [
            'acoustic',
            'alt-rock',
            'alternative',
            'children',
            'classical',
            'club',
            'country',
            'dance',
            'disco',
            'disney',
            'dubstep',
            'edm',
            'electro',
            'electronic',
            'hard-rock',
            'heavy-metal',
            'hip-hop',
            'indie',
            'indie-pop',
            'k-pop',
            'pop',
            'r-n-b',
            'rock',
            'rock-n-roll',
        ]
    ];
    private $access_token;

    /**
     * @param $scopes array Array of scopes
     */
    private static function get_scopes($scopes) {
        return implode(' ', array_map(fn($scope) => Spotify::scopes[$scope], $scopes));
    }

    public static function get_access_token() {
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');

        $options = [
            CURLOPT_URL => "https://accounts.spotify.com/api/token",
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

    public static function authorize_token($response_type, $scope, $redirect_uri) {
        $query = [];
        $query['client_id'] = env('SPOTIFY_CLIENT_ID');
        $query['response_type'] = $response_type;
        $query['scope'] = self::get_scopes($scope);
        $query['redirect_uri'] = $redirect_uri;

        $options = [
            CURLOPT_URL => "https://accounts.spotify.com/authorize?".http_build_query($query),
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
//            CURLOPT_HTTPHEADER => ['Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret)],
        ];
//        dd($options);
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        return curl_exec($ch);
    }

    private static function m_curl_exec($url, $access_token) {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . ($access_token == null ? self::get_access_token() : $access_token),
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

    /**
     * @param $q string Query to search
     * @param $type string Search with types, including album, artist, playlist, track, seperated by comma
     * @param null $access_token
     * @return mixed
     */
    public static function search($q, $type, $limit = 10, $offset = 0, $access_token = null) {
        $query = http_build_query([
            'q' => $q,
            'type' => $type ?? implode(',', Spotify::search_types),
            'market' => 'VN',
            'limit' => $limit,
            'offset' => $offset
        ]);
        $url = 'https://api.spotify.com/v1/search';

        return self::m_curl_exec("$url?$query", $access_token);
    }

    /**
     * @param $type string Between artists, genres and tracks
     * @param $limit int Number of items
     */
    public static function get_top($type, $limit = 10, $offset = 0, $access_token = null) {
        $query = http_build_query([
            'limit' => $limit,
            'market' => 'US',
            "seed_$type" => implode(',', self::seeds[$type]),
        ]);
        $url = "https://api.spotify.com/v1/recommendations?$query&min_energy=0.4&min_popularity=50";

        return self::m_curl_exec($url, $access_token);
    }

    public static function get_all_genres($access_token = null) {
        return self::m_curl_exec('https://api.spotify.com/v1/recommendations/available-genre-seeds', $access_token);
    }

    public static function get_genre_tracks($genre, $limit = 10, $offset = 0, $access_token = null) {
        return self::m_curl_exec('https://api.spotify.com/v1/recommendations?'.
            http_build_query([
                'seed_genres' => $genre,
                'limit' => $limit,
                'offset' => $offset
            ]),
            $access_token
        );
    }

    public static function get_artists($ids, $access_token = null) {
        $url = 'https://api.spotify.com/v1/artists?ids='.implode(',', $ids);
        return self::m_curl_exec($url, $access_token);
    }

    public static function new_releases($limit = 10, $offset = 0, $access_token = null) {
        $url = "https://api.spotify.com/v1/browse/new-releases?offset=$offset&limit=$limit";

        return self::m_curl_exec($url, $access_token);
    }

    public static function find_artist($id, $access_token = null) {
        return self::m_curl_exec("https://api.spotify.com/v1/artists/$id", $access_token);
    }

    public static function find_artist_track($id, $limit = 10, $offset = 0, $access_token = null) {
        return self::m_curl_exec("https://api.spotify.com/v1/artists/$id/top-tracks?market=vn", $access_token);
    }

    public static function find_artist_album($id, $access_token = null) {
        return self::m_curl_exec("https://api.spotify.com/v1/artists/$id/albums", $access_token);
    }

    public static function find_album($id, $access_token = null) {
        return self::m_curl_exec("https://api.spotify.com/v1/albums/$id/tracks", $access_token);
    }

    public static function find_track($id, $rand = false, $access_token = null) {
        $url = "https://api.spotify.com/v1/tracks/".
            ($rand?self::seeds['tracks'][array_rand(self::seeds['tracks'])]:$id);

        return self::m_curl_exec($url, $access_token);
    }
}

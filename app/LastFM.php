<?php


namespace App;


class LastFM
{
    private const key = 'ba73e56629ffe247b90f5a16bb22ec96';
    private const secret = '6c1ebf008829945eac1411dfe492bb8b';
    private const sesstion = 'PO7kpJ7HMxke9P9rSQasY4wMzUFZGDW_';

    private static function m_curl_exec($url) {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $content = json_decode(curl_exec($ch));
        curl_close($ch);
        return $content;
    }

    public static function find_artist($artist) {
        $url = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artist&api_key=ba73e56629ffe247b90f5a16bb22ec96&format=json';
        return self::m_curl_exec("http://ws.audioscrobbler.com/2.0/?".
            http_build_query([
                'method' => 'artist.getInfo',
                'artist' => $artist,
                'api_key' => self::key,
                'format' => 'json'
            ])
        );
    }

    public static function get_session() {
        $url = 'http://ws.audioscrobbler.com/2.0/?method=auth.getSession'
            .'&token='.self::token
            .'&api_key='.self::key
            .'&api_sig='.self::signature;
        return self::m_curl_exec($url);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genius extends Model
{
    private const client_id = 'bpqSJQ7NI4NBPxdaF6HI7U3pEI-k9bD04QCFAv8O3WkBJ4wI2YE2YMQHj3Iy2jVl';
    private const client_secret = 'jZpPBxiTyVNw8DeVRVqw9bySzRvIJ7yYpijuwl7vCQakcrwCiAZBdzKbn_-LiSGHh-OHt95MoPOhpOQzJIsUFg';
    private const access_token = '0tBQSX6b7cLNO8UazT0-TPRrbY-YojCUCDWzsK1-IBlU4NX6StvR-1iAmxKW71i5';

    private static function m_curl_exec($url) {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer ".self::access_token
            ]
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $content = json_decode(curl_exec($ch));
        curl_close($ch);
        return $content;
    }

    public static function search($track, $artist) {
        return self::m_curl_exec($url = "https://api.genius.com/search?q=".urlencode("$track by $artist"));
    }

    public static function find_track($id) {
        return self::m_curl_exec("https://api.genius.com/songs/$id");
    }

    public static function find_artist($id) {
        return self::m_curl_exec("https://api.genius.com/artists/$id");
    }
}

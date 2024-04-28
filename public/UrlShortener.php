<?php

class UrlShortener
{
    public static function shorten($url)
    {
        if (!empty($url)) {
            $shortID = substr(md5(uniqid()), 0, 7);
            $shortenedUrl = "http://localhost:8876/{$shortID}";
            return $shortenedUrl;
        } else {
            throw new Exception("Url shortening error");
        }
    }
}
<?php

namespace Forexite;

class Endpoint
{
    const DAY_ENDPOINT = 'https://www.forexite.com/free_forex_quotes/{year}/{month}/{day}{month}{small_year}.zip';
    
    public static function getDayEndpoint(\DateTime $dateTime)
    {
        $url = self::DAY_ENDPOINT;
        $url = str_replace("{year}", $dateTime->format('Y'), $url);
        $url = str_replace("{month}", $dateTime->format('m'), $url);
        $url = str_replace("{day}", $dateTime->format('d'), $url);
        $url = str_replace("{small_year}", $dateTime->format('y'), $url);
        return $url;
    }
}
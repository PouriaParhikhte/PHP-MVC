<?php

namespace Core\Helpers;

class Configs
{
    public static function hostName(): string
    {
        return '127.0.0.1';
    }

    public static function username(): string
    {
        return 'root';
    }

    public static function password(): string
    {
        return 'fhv9wRB6kCmxfeY4';
    }

    public static function database(): string
    {
        return 'app';
    }

    public static function charset(): string
    {
        return 'utf8mb4';
    }

    public static function domain(): string
    {
        return 'php-mvc/';
    }

    public static function baseUrl(): string
    {
        return "http://$_SERVER[HTTP_HOST]/" . self::domain();
    }

    public static function homePageUrl(): string
    {
        return 'home';
    }

    public static function perPage(): int
    {
        return 3;
    }

    public static function payload(array $input = null)
    {
        $timestamp = microtime(true);
        $payload = [
            'iss' => self::domain(),
            'iat' => $timestamp,
            'nbf' => $timestamp,
            'exp' => $timestamp + self::tokenExpireSeconds()
        ];
        if ($input !== null)
            $payload['data'] = $input;
        return $payload;
    }

    public static function tokenExpireSeconds()
    {
        return 86400;
    }

    public static function secretKey($issuedTime, $expireTime)
    {
        $hash = md5($issuedTime . $expireTime);
        return md5(strrev($hash));
    }
}

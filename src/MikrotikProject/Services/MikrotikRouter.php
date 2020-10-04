<?php


namespace MikrotikProject\Services;

use PEAR2\Net\RouterOS;
spl_autoload_register(function ($className)
{
    $class = './src/'.str_replace('\\', '/', $className).'.php';
    require_once $class;
});

class MikrotikRouter
{
    public static function getConnection()
    {
        // Метод коннекта к роутеру
        $paramsPath = __DIR__ . '/../Components/settings_mikrotik.php';
        $params = include($paramsPath);

        $client = new RouterOS\Client($params['host'], $params['username'], $params['password'], $params['port']);

        return $client;
    }
}

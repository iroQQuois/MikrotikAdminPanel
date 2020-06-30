<?php


namespace MikrotikProject\Services;

use PEAR2\Net\RouterOS;
require_once __DIR__ . '/../../PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php';


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

<?php

namespace MikrotikProject\Models;

use http\Exception\InvalidArgumentException;
use PEAR2\Net\RouterOS;
use MikrotikProject\Services\Db;
use MikrotikProject\Services\MikrotikRouter;
require_once __DIR__ . '/../../PEAR2_Net_RouterOS-1.0.0b6/src/PEAR2/Autoload.php';



abstract class ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }


    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }


    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }


    abstract protected static function getTableName(): string;

    public function getByName(string $name): array
    {
        $dataList = [];
        $db = Db::getInstance();

        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE name=:name',
            [':name' => $name],
            static::class
        );

        $dataList['id'] = $entities[0]->id;
        $dataList['address'] = $entities[0]->address;
        $dataList['mask'] = $entities[0]->mask;
        $dataList['fact_address'] = $entities[0]->fact_address;
        $dataList['name'] = $entities[0]->name;
        $dataList['ip'] = $entities[0]->ip;
        $dataList['port'] = $entities[0]->port;


        return $dataList;
    }


    protected function getTorch(string $name): array
    {
        $mk = MikrotikRouter::getConnection();
        $db = Db::getInstance();

        $dataList = [];


        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE name=:name',
            [':name' => $name],
            static::class
        );

        $mkQuery = new RouterOS\Request("/tool torch interface=ether" . $entities[0]->port . " src-address=". $entities[0]->ip . " duration=5");


        $timer = 0;
        while ($timer <= 5)
        {
            $tx = null;
            $rx = null;
            $tx_packets = null;
            $rx_packets = null;
            $result = null;
            
            $result = $mk->sendSync($mkQuery)->current();
            $dataList[$timer]['tx'] = $result('tx');
            $dataList[$timer]['rx'] = $result('rx');
            $dataList[$timer]['tx-packets'] = $result('tx-packets');
            $dataList[$timer]['rx-packets'] = $result('rx-packets');
            $timer++;
        }


        return $dataList;
    }


    protected function dropSubscriber(string $name): void
    {
        $db = Db::getInstance();

        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE name = :name',
            [':name' => $name]
        );
    }

/*
    protected function checkVoid()
    {
        $db = Db::getInstance();

        $db->query(
            'INSERT INTO '
        )
    }
*/
}
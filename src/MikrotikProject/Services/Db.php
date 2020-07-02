<?php

namespace MikrotikProject\Services;

use MikrotikProject\Exceptions\DbException;


class Db
{
    private static $instance;

    /** @var \PDO */
    private $pdo;


    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../Components/settings_db.php')['db'];
        try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAME UTF8');
        } catch (\PDOException $e)
        {
            throw new DbException('Ошибка при подключении к базе данных');
        }
    }


    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result)
        {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }


    public static function getInstance(): self
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}
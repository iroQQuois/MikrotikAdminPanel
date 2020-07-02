<?php

namespace MikrotikProject\Models\Subscribers;

use MikrotikProject\Models\ActiveRecordEntity;
use MikrotikProject\Exceptions\InvalidArgumentException;


class Subscriber extends ActiveRecordEntity
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $address;

    /** @var string */
    protected $mask;

    /** @var string */
    protected $fact_address;

    /** @var string */
    protected $ip;

    /** @var int */
    protected $port;


    protected static function getTableName(): string
    {
        return 'test';
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }


    public static function getSubscriberByName($userData): array
    {
        // Проверки
        if (empty($userData['name']))
        {
            throw new InvalidArgumentException('Не передано имя абонента');
        }


        $subscriber = new Subscriber();
        $subscriber->setName($userData['name']);
        $subscriber = $subscriber->getByName($subscriber->name);


        return $subscriber;
    }

    public static function getTorchData(string $userData): array
    {
        // Проверки
        if (empty($userData))
        {
            throw new InvalidArgumentException('чота не пошло');
        }

        $subscriber = new Subscriber();
        $subscriber = $subscriber->getTorch($userData);


        return $subscriber;
    }


    public static function delete(string $userData): void
    {
        $subscriber = new Subscriber();
        $subscriber->dropSubscriber($userData);
    }


    public static function searchVoid(): array
    {
        $voidSubscriber = new Subscriber();

        return $voidSubscriber->checkVoid();
    }


    public static function createSubscriber(array $userData, string $id): void
    {
        if (empty($userData))
        {
            throw new InvalidArgumentException('Пустые поля регестрации');
        }
        $newSubscriber = new Subscriber();
        $newSubscriber->mask = $userData['mask'];
        $newSubscriber->name = $userData['name'];
        $newSubscriber->fact_address = $userData['fact_address'];
        $newSubscriber->ip = $userData['ip'];
        $newSubscriber->port = $userData['port'];

        $newSubscriber->create($id);
    }

}
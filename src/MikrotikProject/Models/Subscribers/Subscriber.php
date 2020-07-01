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


    public function getId(): int
    {
        return $this->id;
    }


    public function getAddress(): string
    {
        return $this->address;
    }


    public function getMask(): string
    {
        return $this->mask;
    }


    public function getFactAddress(): string
    {
        return $this->fact_address;
    }


    public function getIp(): int
    {
        return $this->ip;
    }


    public function getPort(): int
    {
        return $this->port;
    }


    public function setName($name)
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

    public static function getTorchData($userData): array
    {
        // Проверки
        if (empty($userData))
        {
            throw new InvalidArgumentException('Не передано имя абонента');
        }

        $subscriber = new Subscriber();
        $subscriber = $subscriber->getTorch($userData);


        return $subscriber;
    }


    public static function delete($userData): void
    {
        $subscriber = new Subscriber();
        $subscriber->dropSubscriber($userData);
    }


    public static function searchVoid(): array
    {
        $voidSubscriber = new Subscriber();

        return $voidSubscriber->checkVoid();
    }


    public static function createSubscriber(array $userData, string $id)
    {
        $newSubscriber = new Subscriber();
        $newSubscriber->mask = $userData['mask'];
        $newSubscriber->name = $userData['name'];
        $newSubscriber->fact_address = $userData['fact_address'];
        $newSubscriber->ip = $userData['ip'];
        $newSubscriber->port = $userData['port'];
        $newSubscriber->create($id);

        return $newSubscriber;
    }

}
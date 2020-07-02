<?php

namespace MikrotikProject\Models\Subscribers;

use MikrotikProject\Models\ActiveRecordEntity;
use MikrotikProject\Exceptions\InvalidArgumentException;


class Subscriber extends ActiveRecordEntity
{
    /**
     * Айди пользователя
     * @var int
     */
    protected $id;

    /**
     * Диапазон ip адресов
     * @var string
     */
    protected $address;

    /**
     * Маска пользователя
     * @var string
     */
    protected $mask;

    /**
     * Расположение пользователя
     * @var string
     */
    protected $fact_address;

    /**
     * Айпи пользователя
     * @var string
     */
    protected $ip;

    /**
     * Порт пользователя
     * @var int
     */
    protected $port;


    protected static function getTableName(): string
    {
        return 'test';
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }


    /** @return array
     * Функция поиска абонента в бд по имени.
     */

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


    /** @return array
     * Получение данных о трафике через роутер Mikrotik по выбранному пользователю
     */

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


    /** @return void
     * Удаления пользователя из бд
     */

    public static function delete(string $userData): void
    {
        $subscriber = new Subscriber();
        $subscriber->dropSubscriber($userData);
    }


    /** @return array
     * Поиск пустых строк в бд
     */

    public static function searchVoid(): array
    {
        $voidSubscriber = new Subscriber();

        return $voidSubscriber->checkVoid();
    }


    /** @return void
     * Создание пользователя в пустой строке с возможнотью их заполнения
     */

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
<?php


namespace MikrotikProject\Controllers;

use MikrotikProject\Models\Subscribers\Subscriber;
use MikrotikProject\Views\View;
use MikrotikProject\Exceptions\InvalidArgumentException;


class AdminController
{
    /** @var View */
    private $view;


    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }


    public function main()
    {
        $this->view->renderHtml('admin/admin.php');

        return;
    }


    public function search()
    {
        /* Поиск абонента по имени */
        if (!empty($_POST))
        {
            try {
                $subscriber = Subscriber::getSubscriberByName($_POST);
                $this->view->renderHtml('admin/search.php', ['subscriber' => $subscriber]);

            } catch (InvalidArgumentException $e)
            {
               $this->view->renderHtml('errors/404.php');
            }
        }

        return;
    }


    public function torch()
    {
        /* проверка трафика выбранного пользователя */
        $urlArray= explode("/", $_SERVER['QUERY_STRING']);
        $url = $urlArray[3];

        try {
            $subscriber = Subscriber::getTorchData($url);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('error/404.php');
        }

        $this->view->renderHtml('admin/torch.php', ['subscriberTraffic' => $subscriber]);
        return;
    }


    public function createSubscriber()
    {
        $urlArray= explode("/", $_SERVER['QUERY_STRING']);
        $url = $urlArray[3];

        try {
            $subscriber = Subscriber::delete($url);
        } catch (InvalidArgumentException $e)
        {
            $this->view->renderHtml('error/404.php');
        }

        $this->view->renderHtml('successful/drop.php');
    }

/*
    public function createSubscriber()
    {
        if (!empty($_POST['newSubscriber']))
        {
            try {
                $subscriber = Subscriber::create($_POST['newSubscriber']);
                $this->view->renderHtml('successful/create.php');

            } catch (InvalidArgumentException $e)
            {
                $this->view->renderHtml('errors/404.php');
            }
        }

        return;
    }
*/
}

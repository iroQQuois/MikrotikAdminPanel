<?php

namespace MikrotikProject\Controllers;

use MikrotikProject\Views\View;


class MainController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main()
    {
        $this->view->renderHtml('main/main.php');
    }
}
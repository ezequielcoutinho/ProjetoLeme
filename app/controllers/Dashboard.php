<?php

namespace app\controllers;

use app\models\Crud;

class Dashboard extends Crud
{
    public function index()
    {
       $clientes = $this->get_clientes();
       $pedidos = $this->get_pedidos();
    
        include_once('app/views/layout/header.php');
        include_once('app/views/dashboard/index.php');
        include_once('app/views/layout/footerJs.php');
    }
}
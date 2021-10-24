<?php

namespace app\controllers;

use app\models\Crud;

class ConsultaPedido extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Consulta',
            'sub_title' => 'consulta pedidos cadastrados',
            'title_tabela' => 'Pedidos Castrados',
            'empresa' => 'Leme Forence',
            'url' => 'Pedidos',
        );

        $pedidos = $this->get_pedidos();

        include_once('app/views/layout/header.php');
        include_once('app/views/con_pedidos/index.php');
        include_once('app/views/layout/footerJs.php');
    }


}

<?php

namespace app\controllers;

use app\models\Crud;

class CadastroPedido extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Cadastro',
            'sub_title' => 'cadastrar novos pedidos',
            'empresa' => 'Leme Forence',
            'url' => 'Pedidos',
        );

        $clientes_ativos = $this->get_clientes_ativos();
        $status_pedido = $this->get_status_pedido();

        include_once('app/views/layout/header.php');
        include_once('app/views/cad_pedidos/index.php');
        include_once('app/views/layout/footerJs.php');
    }

    public function cadPedido()
    {
       $pedidos = $this->create_pedido();
       header('Location:?router=ConsultaPedido/');
    }

}

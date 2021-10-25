<?php

namespace app\controllers;

use app\models\Crud;

class ConsultaClienteAtivo extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Consulta',
            'sub_title' => 'consulta clientes',
            'title_tabela_ativos' => 'Clientes Ativos',
            'empresa' => 'Leme Forence',
            'url' => 'Clientes Ativos',
        );

        $clientes_ativos = $this->get_clientes_ativos();

        include_once('app/views/layout/header.php');
        include_once('app/views/con_clientes_ativos/index.php');
        include_once('app/views/layout/footerJs.php');
    }
}

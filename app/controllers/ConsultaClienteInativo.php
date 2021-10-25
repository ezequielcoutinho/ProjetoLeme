<?php

namespace app\controllers;

use app\models\Crud;

class ConsultaClienteInativo extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Consulta',
            'sub_title' => 'consulta clientes',
            'title_tabela_inativos' => 'Clientes Inativos',
            'empresa' => 'Leme Forence',
            'url' => 'Clientes Inativos',
        );

        $clientes_inativos = $this->get_clientes_inativos();
    
        include_once('app/views/layout/header.php');
        include_once('app/views/con_clientes_inativos/index.php');
        include_once('app/views/layout/footerJs.php');
    }
}

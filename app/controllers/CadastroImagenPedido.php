<?php

namespace app\controllers;

use app\models\Crud;

class CadastroImagenPedido extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Cadastro',
            'sub_title' => 'cadastrar imagens pedidos',
            'empresa' => 'Leme Forence',
            'url' => 'Imagens Pedidos',
        );

        $pedidos = $this->get_pedidos();

        include_once('app/views/layout/header.php');
        include_once('app/views/cad_imagem_pedidos/index.php');
        include_once('app/views/layout/footerJs.php');
    }

    public function cadImagen()
    {
       $pedidos = $this->create_imagen();
       header('Location:?router=CadastroImagenPedido/');
    }

}

<?php

namespace app\controllers;

use app\models\Crud;

class DeletePedido extends Crud
{
    public function delete_pedido()
    {
      
        $excluir = $this->excluir_pedido();
        header('Location:?router=ConsultaPedido/');
    }

}

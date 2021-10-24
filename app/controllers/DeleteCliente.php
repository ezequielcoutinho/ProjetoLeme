<?php

namespace app\controllers;

use app\models\Crud;

class DeleteCliente extends Crud
{
    public function delete_cliente_ativo()
    {
      
        $excluir = $this->excluir_cliente_ativo();
        header('Location:?router=ConsultaClienteAtivo/');
    }

    public function delete_cliente_inativo()
    {
      
        $excluir = $this->excluir_cliente_inativo();
        header('Location:?router=ConsultaClienteInativo/');
    }
}

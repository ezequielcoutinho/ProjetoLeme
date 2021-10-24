<?php

namespace app\controllers;

use app\models\Crud;

class UpdateCliente extends Crud
{
    public function inativar_cliente()
    {
      
        $inativar = $this->inativarCliente();
        header('Location:?router=ConsultaClienteInativo/');
    }

    public function ativar_cliente()
    {
      
        $excluir = $this->ativarCliente();
        header('Location:?router=ConsultaClienteAtivo/');
    }
}

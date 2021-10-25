<?php
namespace app\controllers;

use app\models\Crud;

class CadastroCliente extends Crud
{
    public function index()
    {
        $data = array(

            'title' => 'Cadastro',
            'sub_title' => 'cadastrar novos clientes',
            'empresa' => 'Leme Forence',
            'url' => 'Clientes',
        );

        include_once('app/views/layout/header.php');
        include_once('app/views/cad_clientes/index.php');
        include_once('app/views/layout/footerJs.php');
    }

    public function cadCliente()
    {
        session_start();
        $data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
        $idade_minima = 18;


        $data_nacimento = date('Y', strtotime($data_nasc));
        $data_nacimento = intval($data_nacimento);

        $data_atual = date("Y");
        $data_atual = intval($data_atual);

        $result_data = $data_atual - $data_nacimento;

        if ($result_data < $idade_minima) {
            $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro</strong> ao cadastrar! idade mínima : ' . $idade_minima . ' anos' . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';

            header('Location:?router=CadastroCliente/');
        } else {
            $clientes = $this->create_cliente();
            header('Location:?router=CadastroCliente/');
        }
    }
}

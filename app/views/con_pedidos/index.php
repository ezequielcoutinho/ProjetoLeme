<?php
session_start();
?>

<body>
    <div class="wrapper">
        <!--Navbar-->
        <?php include_once('app/views/home/navbar.php') ?>
        <!--FimNavbar-->

        <div class="page-wrap">
            <!--Sidebar-->
            <?php include_once('app/views/home/sidebar.php') ?>
            <!--Fim Sidebar-->

            <!--Conteudo-->
            <div class="main-content">
                <div class="container-fluid">
                    <?php
                    if (isset($_SESSION['msg'])) :
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    endif;
                    ?>
                    <!--Header conteudo-->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-4">
                                <div class="page-header-title">
                                    <i class="fas fa-certificate bg-blue"></i>
                                    <div class="d-inline">
                                        <h5><?= $data['title'] ?></h5>
                                        <span><?= $data['sub_title'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-title">
                                    <i class="far fa-building bg-blue"></i>
                                    <div class="d-inline">
                                        <h5><?= $data['empresa'] ?></h5>
                                        <span><?= date('d/m/Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a data-toggle="tooltip" data-placement="bottom" title="Home" href=?router=home /><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"><?= $data['title'] ?> / <?= $data['url'] ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--Fim Header conteudo-->

                    <!--Tabela pedidos-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3><?= $data['title_tabela'] ?></h3>
                                </div>
                                <div class="card-body ">
                                    <table class="table data-table" style="width: 100%; margin-left:1px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Data Pedido</th>
                                                <th>Desc Produto</th>
                                                <th>Status Pedido</th>
                                                <th>Valor</th>
                                                <th>Cliente</th>
                                                <th class="nosort text-right pr-50">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($pedidos as $pedido) : ?>
                                                    <th><?= $pedido['id'] ?></th>
                                                    <td><?= date('d/m/Y H:i:s', strtotime($pedido['data'])) ?></td>
                                                    <td><span class="badge badge-pill badge-info"><i class="fas fa-database"></i> <?= $pedido['produto'] ?></span></td>
                                                    <td><span class="badge badge-pill badge-info"><i class="fas fa-database"></i> <?= $pedido['descricao'] ?></span></td>
                                                    <td><span class="badge badge-pill badge-info"><i class="far fa-money-bill-alt"></i> <?= $pedido['valor'] ?></span></td>
                                                    <td><?= $pedido['nome'] ?></td>
                                                    <td class="text-right">
                                                        <a class="btn btn-icon btn-outline-danger" data-toggle="modal" data-target="#delete_pedido" data-whateverId="<?= $pedido['id'] ?>" data-whateverProduto="<?= $pedido['produto'] ?>"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim Tabela pedidos-->

                </div>
            </div>
            <!--Fim Conteudo-->

            <!--Footer-->
            <?php include_once('app/views/home/footer.php') ?>
            <!--Fim Footer-->
        </div>
    </div>

    <!--Modal excluir  pedido-->
    <div class="modal fade" id="delete_pedido" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h7 class="modal-title" id="demoModalLabel">teste</h7>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h3 class="text-center pt-4">-- Excluir Pedido --</h3>
                                                <h5 class="text-center pt-4" id="texto">TEXTO</h5>
                                            </div>
                                            <form method="POST" action="?router=DeletePedido/delete_pedido/" class="forms-sample">
                                                <!--ID-->
                                                <input type="hidden" name="id" id="id_cliente">

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success mr-2">Sim</button>
                                                    <button type="button" class="btn btn-info mr-2" data-dismiss="modal">Não</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fim Modal excluir pedido-->
</body>
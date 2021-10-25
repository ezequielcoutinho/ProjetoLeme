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
                                    <i class="fas fa-users bg-blue"></i>
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

                    <!--Tabela Clientes Ativos-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><?= $data['title_tabela_ativos'] ?></h3>
                            </div>
                            <div class="card-body ">
                                <table class="table data-table" style="width: 100%; margin-left:1px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th class="nosort text-right pr-50">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($clientes_ativos as $cliente) : ?>
                                                <td><?= $cliente['id'] ?></td>
                                                <td><span class="badge badge-pill badge-info"><i class="fas fa-user"></i> <?= $cliente['nome'] ?></span></td>
                                                <td><span class="badge badge-pill badge-info"><i class="far fa-address-card"></i> <?= $cliente['cpf'] ?></span></td>
                                                <td class="text-right">
                                                    <a class="btn btn-icon btn-outline-secondary" data-toggle="modal" data-target="#inativar_cliente" data-whateverId="<?= $cliente['id'] ?>" data-whateverNome="<?= $cliente['nome'] ?>"><i class="fas fa-minus"></i></a>
                                                    <a class="btn btn-icon btn-outline-danger" data-toggle="modal" data-target="#delete_cliente" data-whateverId="<?= $cliente['id'] ?>" data-whateverNome="<?= $cliente['nome'] ?>"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Fim Tabela Clientes Ativos-->
                </div>
            </div>
            <!--Fim Conteudo-->

            <!--Footer-->
            <?php include_once('app/views/home/footer.php') ?>
            <!--Fim Footer-->
        </div>
    </div>

    <!--Modal excluir  Cliente Ativo-->
    <div class="modal fade" id="delete_cliente" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
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
                                                <h3 class="text-center pt-4">-- Excluir Cliente --</h3>
                                                <h5 class="text-center pt-4" id="texto">TEXTO</h5>
                                            </div>
                                            <form method="POST" action="?router=DeleteCliente/delete_cliente_ativo/" class="forms-sample">
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
    <!--Fim Modal excluir Cliente Ativo-->

    <!--Modal Inativar Cliente-->
    <div class="modal fade" id="inativar_cliente" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
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
                                                <h3 class="text-center pt-4">-- Inativar Cliente --</h3>
                                                <h5 class="text-center pt-4" id="texto">TEXTO</h5>
                                            </div>
                                            <form method="POST" action="?router=UpdateCliente/inativar_cliente/" class="forms-sample">
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
    <!--Fim Modal Inativar Cliente-->
</body>
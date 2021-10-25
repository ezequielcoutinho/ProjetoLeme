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

                    <!-- Form cad produto -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3><?= $data['sub_title'] ?></h3>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" method="POST" action="?router=CadastroImagenPedido/cadImagen/">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pedido</label>
                                                    <select class="form-control" name="pedido" required>
                                                        <option disabled selected>Selecione</option>
                                                        <option disabled>-----------</option>
                                                        <?php foreach ($pedidos as $pedido) : ?>
                                                            <option data-icon="fas fa-print" value="<?= $pedido['id'] ?>">ID Pedido: <?= $pedido['id'] ?> Produto: <?= $pedido['produto'] ?> </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" name="imagen_pedido" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Imagem Pedido</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" name="capa" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Capa</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-primary mr-2">Gravar</button>
                                        <button type="reset" class="btn btn-light">Limpar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim Form cad produto-->

                </div>
            </div>
            <!--Fim Conteudo-->

            <!--Footer-->
            <?php include_once('app/views/home/footer.php') ?>
            <!--Fim Footer-->
        </div>
    </div>
</body>
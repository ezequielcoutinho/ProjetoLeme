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
                    <h1>Dashboard</h1>

                    <div class="row">
                        <!--Clientes-->
                        <div class="col-xl-6 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="mb-30 bg-info lbl-card"><i class="fas fa-users"></i> Clientes</p>
                                    <div class="text-center">
                                        <h2 class="mb-0 d-inline-block text-info"><?= count($clientes) ?></h2>
                                        <p class="mb-0 d-inline-block">Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim Clientes-->

                        <!--Pedidos-->
                        <div class="col-xl-6 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="mb-30 bg-green lbl-card"><i class="fas fa-shopping-cart"></i> Pedidos</p>
                                    <div class="text-center">
                                        <h2 class="mb-0 d-inline-block text-green"><?= count($pedidos) ?></h2>
                                        <p class="mb-0 d-inline-block">Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim Pedidos-->
                    </div>
                </div>
            </div>
            <!--Fim Conteudo-->

            <!--Footer-->
            <?php include_once('app/views/home/footer.php') ?>
            <!--Fim Footer-->
        </div>
    </div>
</body>
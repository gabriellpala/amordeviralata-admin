<?php
require_once('valida_session.php');
require_once('header.php');
require_once('sidebar.php');
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">

                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">CONTATOS RECEBIDOS PELO SITE</h6>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['texto_erro'])):
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i
                                class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['texto_erro']);
                endif;
                ?>

                <?php
                if (isset($_SESSION['texto_sucesso'])):
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['texto_sucesso']);
                endif;
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th style="width: 15%;">Nome</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 15%;">Telefone</th>
                                <th>Mensagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("bd/bd_contatos.php");
                            $contatos = listaContatos();
                            foreach ($contatos as $dados):
                                ?>
                                <tr>
                                    <td style="display:none;"><?= $dados['id'] ?></td>
                                    <td><?= $dados['nome'] ?></td>
                                    <td><?= $dados['email'] ?></td>
                                    <td><?= $dados['telefone'] ?></td>
                                    <td class="w-100"><?= $dados['mensagem'] ?></td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once('footer.php');
    ?>
</div>

<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ADICIONAR USUÁRIO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
             <?php
             if (isset($_SESSION['texto_erro'])):
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong> 
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

                <form class="user" action="cad_usuario_envia.php" method="post" >
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome Completo </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php if (!empty($_SESSION['nome'])) { echo $_SESSION['nome'];} ?>"  
                            placeholder="Nome Completo" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Email </label>
                            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php if (!empty($_SESSION['email'])) { echo $_SESSION['email'];} ?>"
                            placeholder="Endereço de Email" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> CEP </label>
                            <input type="number" class="form-control form-control-user"
                            id="cep" name="cep" placeholder="CEP" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Endereço </label>
                            <input type="text" class="form-control form-control-user"
                            id="endereco" name="endereco" placeholder="Endereço" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Número </label>
                            <input type="number" class="form-control form-control-user"
                            id="numero" name="numero" placeholder="Número" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Bairro </label>
                            <input type="text" class="form-control form-control-user"
                            id="bairro" name="bairro" placeholder="Bairro" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Cidade </label>
                            <input type="text" class="form-control form-control-user"
                            id="cidade" name="cidade" placeholder="Cidade" required>
                        </div>
                        <div class="col-sm-6">
                            <label> UF </label>
                            <input type="text" class="form-control form-control-user"
                            id="uf" name="uf" placeholder="UF" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Senha </label>
                            <input type="password" class="form-control form-control-user"
                            id="senha" name="senha" placeholder="Senha" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Confirmar Senha </label>
                            <input type="password" class="form-control form-control-user"
                            id="confirma_senha" name="confirma_senha" placeholder="Confirmar Senha"  oninput="validatepassword(this)" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label> Situação </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value=""> </option>
                                <option value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            </select>
                        </div>
                        
                    </div>                    

                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <button type="button" class="btn btn-secondary" onclick="preencherDadosFake()">Preencher com Dados Fake</button>
                            <a title="Voltar" href="usuario.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
                            <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary uptadebtn"><i class="fa fa-user-circle">&nbsp;</i>Adicionar</button> </a>
                        </div>
                    </div>
                </form>  
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once('footer.php');
?>
<script src='./api/cep/viacep.js'></script>

<script>
    function preencherDadosFake() {
        document.getElementById('nome').value = 'João da Silva';
        document.getElementById('email').value = 'joao.silva@example.com';
        document.getElementById('senha').value = 'Senha123';
        document.getElementById('confirma_senha').value = 'Senha123';
        document.getElementById('cep').value = '12345678';
        document.getElementById('endereco').value = 'Rua Exemplo';
        document.getElementById('numero').value = '123';
        document.getElementById('bairro').value = 'Centro';
        document.getElementById('cidade').value = 'Cidade Exemplo';
        document.getElementById('uf').value = 'SP';
        document.getElementById('status').value = '1';
    }
</script>
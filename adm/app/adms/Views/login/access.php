<?php

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}


// If it exists, keep the data in the form
if (isset($this->data['form'])) {
    $formValue = $this->data['form'];
}
?>

<form id="send_login" method="POST" action="" class="form-signin" enctype="multipart/form-data">
    <div class="text-center mb-4">
        <img class="mb-4" src="<?php echo URLADM; ?>app/adms/assets/images/login/amacd-2021-novo-branco.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal text-light">Área restrita</h1>
    </div>

    <?php
    //If it exists, print the warning message and destroy it
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <span class="msg"></span>

    <div class="form-label-group">
        <label for="username" class="sr-only">Usuário</label>
        <input name="username" type="text" id="username" class="form-control mb-4" placeholder="Digite o usuário" value="<?php
        // If it exists, fill in the field with its value
        if (isset($valorForm['username'])) {
            echo $valorForm['username'];
        }
        ?>" required autofocus>
    </div>
    <div class="form-label-group">
        <label for="password" class="sr-only">Senha</label>
        <input name="password" type="password" id="password" class="form-control" placeholder="Digite a senha" required>
    </div>

    <input name="SendLogin" type="submit" value="Acessar" class="btn btn-lg btn-primary btn-block">

    <p class="mt-2 mb-3 text-muted text-center">
        <a href="<?php echo URLADM; ?>new-user/index" class="text-decoration-none">Cadastrar</a> - 
        <a href="<?php echo URLADM; ?>recover-password/index" class="text-decoration-none">Esqueceu a Senha</a>
    </p>

    <p class="mt-2 mb-3 text-muted text-center">
        Usuário: acdona@hotmail.com<br>
        Senha: 123456a
    </p>
</form>


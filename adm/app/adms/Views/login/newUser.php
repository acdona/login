<?php

    if (!defined('R4F5CC')) { 
        header("Location: /");
        die("Erro: Página não encontrada!");
    }


if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}


?>
        
          
            <form id="new_user" class="form-signin" method="POST" action="">
            
            <div class="text-center- mb-4">
                 <h1 class="h3 mb-3 font-weight-normal">Novo Usuário</h1>
            </div> 

            <?php         
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }       
            ?>
         
            <span class="msg"></span>
            
                <div class="form-label-group">
                    <label>Nome</label><br><br>
                    <input name="name" type="text" id="name" placeholder="Digite o nome completo" value="<?php
                    if (isset($valorForm['name'])) {
                        echo $valorForm['name'];
                    }
                    ?>" required autofocus>
                </div>

                <div class="form-label-group">
                    <label>E-mail</label><br><br>
                    <input name="email" type="text" id="email" placeholder="Digite o seu melhor e-mail" value="<?php
                    if (isset($valorForm['email'])) {
                        echo $valorForm['email'];
                    }
                    ?>">
                </div>

                <div class="form-label-group">
                    <label>Senha</label><br><br>
                    <input name="password" type="password" id="password" placeholder="Digite a senha" onkeyup="passwordStrength()">
                    <span id="msgViewStrength"></span>
                </div>

                <input name="SendNewUser" type="submit" class="btn btn-outline-success value="Cadastrar">  
                <p><a href="<?php echo URLADM; ?>login/access" color-white>Clique aqui</a> para acessar</p>
            </form>

            
        
 
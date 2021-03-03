<?php
if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 title">Perfil</h2>
            </div>
            <?php
            if (!empty($this->data['profile'])) {
                extract($this->data['profile'][0]);
                ?>
                <div class="p-2">
                    <span class="d-none d-lg-block">
                        <a href="<?php echo URLADM . 'edit-profile/index'; ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                        <a href="<?php echo URLADM . 'edit-profile-password/index'; ?>" class="btn btn-outline-warning btn-sm">Editar Senha</a>
                        <a href="<?php echo URLADM . 'edit-profile-image/index'; ?>" class="btn btn-outline-warning btn-sm">Editar Imagem</a>
                    </span>
                    <div class="dropdown d-block d-lg-none">
                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                            <a class="dropdown-item" href="<?php echo URLADM . 'edit-profile/index'; ?>">Editar</a>
                            <a class="dropdown-item" href="<?php echo URLADM . 'edit-profile-password/index'; ?>">Editar Senha</a>
                            <a class="dropdown-item" href="<?php echo URLADM . 'edit-profile-image/index'; ?>">Editar Imagem</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr class="hr-title">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        if (!empty($this->data['profile'])) {
            ?>
            <dl class="row">

                <?php
                
                if (!empty($image) AND (file_exists("app/adms/assets/images/users/" . $_SESSION['user_id'] . "/$image"))) {
                    $image = URLADM . "app/adms/assets/images/users/" . $_SESSION['user_id'] . "/$image";
                } else {
                    $image = URLADM . "app/adms/assets/images/users/icon_user.png";
                }
                ?>

                <dt class="col-sm-3">Imagem</dt>
                <dd class="col-sm-9 mb-4">
                    <div class="img-edit">
                        <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-thumbnail view-img-size">
                        <div class="edit">
                            <a href="<?php echo URLADM . 'edit-profile-image/index'; ?>" class="btn btn-outline-warning btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9"><?php echo $name; ?></dd>

                <dt class="col-sm-3">Apelido</dt>
                <dd class="col-sm-9"><?php echo $nickname; ?></dd>

                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9"><?php echo $email; ?></dd>

                <dt class="col-sm-3">Usuário</dt>
                <dd class="col-sm-9"><?php echo $username; ?></dd>
            </dl>
            <?php
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro: Usuário não encontrado!</div>";
        }
        ?>
    </div>
</div>
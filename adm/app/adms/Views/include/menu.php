<?php
 
 if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
 
?>


<div class="d-flex">
<nav class="sidebar">
    <ul class="list-unstyled">
        <li class="active"><a href="<?php echo URLADM; ?>dashboard/index"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="<?php echo URLADM; ?>list-users/index"><i class="fas fa-users"></i> Usuários</a></li>
        <li><a href="<?php echo URLADM; ?>list-colors/index"><i class="fas fa-users"></i> Cores</a></li>

        <li>
            <a href="#submenu4" data-toggle="collapse"><i class="fas fa-video"></i> Situação do usuário</a>
            <ul id="submenu4" class="list-unstyled collapse">
                <li><a href="<?php echo URLADM; ?>list-sits-users/index"><i class="fab fa-youtube"></i> Lista Situação do usuário</a></li>
                <li><a href="<?php echo URLADM; ?>list-conf-emails/index"><i class="fab fa-vimeo-v"></i> Lista Conf Emails</a></li>
            </ul>
        </li>


        <li>
            <a href="#submenu5" data-toggle="collapse"><i class="fas fa-car"></i> Item 5</a>
            <ul id="submenu5" class="list-unstyled collapse">
                <li><a href="#"><i class="fas fa-bus"></i> Item 5.1</a></li>
                <li><a href="#"><i class="fas fa-car-side"></i> Item 5.2</a></li>
                <li><a href="#"><i class="fas fa-shuttle-van"></i> Item 5.3</a></li>
                <li><a href="#"><i class="fas fa-truck"></i> Item 5.4</a></li>
                <li><a href="#"><i class="fas fa-gas-pump"></i> Item 5.5</a></li>
                <!-- Para manter o submenu aberto e selecionado utilizar: class="active" -->
                <!--<li class="active"><a href="#"><i class="fas fa-car-battery"></i> Item 5.6</a></li>-->
                <li><a href="#"><i class="fas fa-oil-can"></i> Item 5.7</a></li>
            </ul>
        </li>
        <li><a href="#">Item 6</a></li>
        <li><a href="#">Item 7</a></li>
        <li><a href="#">Item 8</a></li>
        <li><a href="<?php echo URLADM; ?>view-perfil/index"><i class="far fa-user"></i> Perfil</a></li>
        <li><a href="<?php echo URLADM; ?>logout/index"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
    </ul>
</nav>



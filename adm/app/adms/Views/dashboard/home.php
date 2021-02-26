<div class="container">
    <?php
    
    echo "Bem vindo " . $_SESSION['user_name'] . "<br>";
    echo "Email utilizado: " . $_SESSION['user_email']. "<br>";
    echo "<a href='" . URLADM . "logout/index'>Sair</a>";
    ?>
</div>
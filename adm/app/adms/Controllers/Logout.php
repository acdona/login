<?php
namespace App\adms\Controllers;

/**
 * Logout Control Responsible for logging out user. 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public 
 *
*/
class Logout
{

    public function index() {
        unset($_SESSION['user_id'], $_SESSION['user_nome'], $_SESSION['user_email']);
        
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Deslogado com sucesso!</div>';
        $urlDestino = URLADM . 'login/access';
        header("Location: $urlDestino");
    }

}

?>
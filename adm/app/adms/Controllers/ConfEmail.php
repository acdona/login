<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}


/**
 * ConfEmail Controller. Responsible for confirming the user's email.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class ConfEmail
{

    private $key;

    public function index() {
        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);
       
        if(!empty($this->key)) {
            $this->validateKey();
        }else {
            $_SESSION['msg'] = "Erro: Link inválido!<br>";
            $urlDestiny = URLADM . "login/index";
            header("Location: $urlDestiny");
        }
    }

    private function validateKey() {
        
        $confEmail = new \App\adms\Models\AdmsConfEmail();
        $confEmail->confEmail($this->key);
        if($confEmail->getResult()) {
            $urlDestiny = URLADM . "login/index";
            header("Location: $urlDestiny");
        } else {
            $urlDestiny = URLADM . "login/index";
            header("Location: $urlDestiny");
        }

    }

}

?>
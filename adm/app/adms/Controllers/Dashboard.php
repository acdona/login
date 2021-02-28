<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Classe Dashboard responsável por 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class Dashboard
{

    public function index() {
      
        $loadView= new \Core\ConfigView("adms/Views/dashboard/home");
        $loadView->render();
    }

}

?>
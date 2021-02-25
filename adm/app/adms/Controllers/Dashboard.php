<?php
namespace App\adms\Controllers;

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
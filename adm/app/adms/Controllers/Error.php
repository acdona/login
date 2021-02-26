<?php
namespace App\adms\Controllers;

/**
 * Error controller Responsible for displaying the error page 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class Error
{

    private array $data;

    public function index()
    {
        
        $this->data = [];
        $viewError = new \App\adms\Models\AdmsError;
        $viewError->view();
        
        /** Load View Home */
        $loadView = new \Core\ConfigView("adms/Views/error/error", $this->data);
        $loadView->render();
    }

}

?>
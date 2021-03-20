<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * PdfUser . Responsible for  printing users.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class PdfUser
{
    private array $data;

    public function generatePdf()
    {       
        $listUsers = new \App\adms\Models\AdmsListUserPdf();
        $this->data = $listUsers->generatePdf();

        $loadView = new \Core\ConfigView("adms/Views/user/generatePdfUser" , $this->data);
        $loadView->generatePdf();
    }
    

}

?>

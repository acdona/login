<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * ListUsers Controller responsible for listing users.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class ListUsers
{
    /** @var array $data Receives the data that must be sent to the VIEW user list. */
    private array $data;
   
    /** @var int $pag Receive an integer for the page. */
    private int $pag;

    public function index($pag = null) {
        
        $this->pag = (int) $pag ? $pag : 1;

        $listUsers = new \App\adms\Models\AdmsListUsers();
        $listUsers->listUsers($this->pag);

        if($listUsers->getResult()) {
            $this->data['listUsers'] = $listUsers->getDatabaseResult();
            $this->data['pagination'] = $listUsers->getResultPg();
        }else {
            $this->data['listUsers'] = [];
            $this->data['pagination'] = null;
        }
        
        $loadView = new \Core\ConfigView("adms/Views/users/listUsers" , $this->data);
        $loadView->render();
    }

}

?>
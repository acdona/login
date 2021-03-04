<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * ViewAccessLevel Controller. Responsible for viewing the access level.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class ViewAccessLevel
{
    /** @var int $id Receives an integer referring to the access level id. */
    private int $id;
    
    /** @var array $data Receives data that must be sent to VIEW. */
    private $data;

    public function index($id) {
        $this->id = $id;
        
        if (!empty($this->id)) {
            
            $viewAccessLevel = new \App\adms\Models\AdmsViewAccessLevel();
            $viewAccessLevel->viewAccessLevel($this->id);
       
            if ($viewAccessLevel->getResult()) {
                $this->data['viewAccessLevel'] = $viewAccessLevel->getDatabaseResult();
                $this->viewAccessLevel();
            } else {
                $urlDestiny = URL . "list-access-levels/index";
                header("Location: $urlDestiny");
            }
        } else {
            $_SESSION['msg'] = "Nível de acesso não encontrado!<br>";
            $urlDestiny = URL . "list-access-levels/index";
            header("Location: $urlDestiny");
        }
    }
    
    private function viewAccessLevel() {
       
        $loadView = new \Core\ConfigView("adms/Views/accessLevels/viewAccessLevel", $this->data);
        $loadView->render();
    }

}

?>
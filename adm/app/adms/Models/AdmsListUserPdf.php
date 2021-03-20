<?php
namespace App\adms\Models;


if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsListUserPdf Model. Responsible for printing de users. 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsListUserPdf
{

    private $Dados;
    private int $id;
    
    public function generatePdf(){
        $listUsers = new \App\adms\Models\helper\AdmsRead();
        $listUsers->fullRead("SELECT id, name, email FROM adms_users");
        $this->Dados = $listUsers->getReadingResult();
        //var_dump($this->Dados); exit("dentro da model");
        return $this->Dados; 
    }

    public function viewUserDetail($id){
        $this->id = (int) $id;                                    
        $userDetail = new \App\adms\Models\helper\AdmsRead();
        $userDetail->fullRead("SELECT id, name, nickname, email, username FROM adms_users WHERE id =:id LIMIT :limit", "id={$this->id}&limit=1");
        $this->Dados = $userDetail->getReadingResult();
      
        return $this->Dados;
    }

}

?>
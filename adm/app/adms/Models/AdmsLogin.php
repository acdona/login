<?php
namespace App\adms\Models;

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsLogin Models responsible for login 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsLogin extends helper\AdmsConn
{

    private array $data;
    private $databaseResult;
    private bool $result = false;
    
    function getResult(): bool {
        return $this->result;
    }

    function getDatabaseResult() {
        return $this->databaseResult;
    }

    public function login(array $data=null) {
        $this->data = $data;
             
        $viewUser = new \App\adms\Models\helper\AdmsRead();
        $viewUser->fullRead("SELECT id, name, nickname, email, password, adms_sits_user_id, image 
                              FROM adms_users
                              WHERE username =:username OR email =:email
                              LIMIT :limit",
                              "username={$this->data['username']}&email={$this->data['username']}&limit=1");
                          
      
        $this->databaseResult = $viewUser->getReadingResult();
      
        if($this->databaseResult){
            $this->valEmailPerm();
            
           
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Usuário não encontrado</div>";
            $this->result = false;
        }
          
    }

    private function valEmailPerm() {
       
        if ($this->databaseResult[0]['adms_sits_user_id'] == 3) {
            $_SESSION['msg'] = "Erro: Necessário confirmar o e-mail, solicite novo e-mail <a href='" . URLADM . "new-conf-email/index'>clique aqui</a>!<br>";
            $this->result = false;
        } elseif ($this->databaseResult[0]['adms_sits_user_id'] == 5) {
            $_SESSION['msg'] = "Erro: E-mail descadastrado, entre em contato com a empresa!<br>";
            $this->result = false;
        } elseif ($this->databaseResult[0]['adms_sits_user_id'] == 2) {
            $_SESSION['msg'] = "Erro: E-mail inativo, entre em contato com a empresa!<br>";
            $this->result = false;
        } else {
            $this->validatePassword();
        }
    }
    
    private function validatePassword() {

        if(password_verify($this->data['password'], $this->databaseResult[0]['password'])){
            
            $_SESSION['user_id'] = $this->databaseResult[0]['id'];
            $_SESSION['user_name'] = $this->databaseResult[0]['name'];
            $_SESSION['user_email'] = $this->databaseResult[0]['email'];
            $_SESSION['user_nickname'] = $this->databaseResult[0]['nickname'];
            $_SESSION['user_image'] = $this->databaseResult[0]['image'];
          
            $this->result = true;
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Usuário ou senha incorreta!</div>';
            $this->result = false;
        }
    }


}

?>
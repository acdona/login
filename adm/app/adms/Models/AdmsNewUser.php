<?php
namespace App\adms\Models;

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsNewUser Model. Responsible for handling new user registration data.  
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public 
 *
*/
class AdmsNewUser
{


    private array $data;
    private bool $result;

    function getResult() {
        return $this->result;
    }

    public function create(array $data = null) {
        $this->data = $data;


        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();


        $valEmptyField->validateData($this->data);
        if ($valEmptyField->getResult()) {
          
            $this->valInput();
        } else {
            $this->result = false;
        }
    }
    
    private function valInput() {
        
        
        $valEmail = new \App\adms\Models\helper\AdmsValEmail();
        $valEmail->validateEmail($this->data['email']);
             
        $valEmailSingle = new \App\adms\Models\helper\AdmsValEmailSingle();
        $valEmailSingle->validateEmailSingle($this->data['email']);

        $valPassword = new \App\adms\Models\helper\AdmsValPassword();
        $valPassword->validatePassword($this->data['password']);
        
        $valUserSingleLogin = new \App\adms\Models\helper\AdmsValUserSingleLogin();
        $valUserSingleLogin->validateUserSingleLogin($this->data['email']);
       
        if($valEmail->getResult() AND $valEmailSingle->getResult() AND $valPassword->getResult() AND $valUserSingleLogin->getResult()){
      
            $this->add();
            
        }else{
            
            $this->result = false;
        }
    }

    private function add() {
        $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
        $this->data['username'] = $this->data['email'];
        $this->data['conf_email'] = password_hash($this->data['password'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        $this->data['created'] = date("Y-m-d H:i:s");
    
         $createUser = new \App\adms\Models\helper\AdmsCreate();
        $createUser->exeCreate("adms_users", $this->data);
        
        if ($createUser->getCreateResult()) {
            
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Erro: Usuário não cadastrado!</div>";
            $this->result = false;
        }
    }

}

?>
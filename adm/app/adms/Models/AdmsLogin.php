<?php
namespace App\adms\Models;

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
        return $this->fdatabaseResult;
    }

    public function login(array $data=null) {
        $this->data = $data;
   
        
        $viewUser = new \App\adms\Models\helper\AdmsRead();
        $viewUser->fullRead("SELECT id, name, nickname, email, password, image 
                              FROM adms_users
                              WHERE username =:username OR email =:email
                              LIMIT :limit",
                              "username={$this->data['username']}&email={$this->data['username']}&limit=1");
                          
      
        $this->databaseResult = $viewUser->getResult();
       
        if($this->databaseResult){
            $this->validatePassword();
            
           
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Usuário não encontrado</div>";
            $this->resultado = false;
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
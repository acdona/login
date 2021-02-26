<?php
namespace App\adms\Models\helper;

/**
 * AdmsValEmail Helper. Responsible for validating the email.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsValEmail
{

    private string $email;
    private bool $result;

    function getResult(): bool {
        return $this->result;
    }
    
    public function validateEmail($email) {
        $this->email = $email;
        
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "Erro: E-mail inválido!";
            $this->result = false;            
        }
    }

}

?>
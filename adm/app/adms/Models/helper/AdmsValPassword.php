<?php
namespace App\adms\Models\helper;

/**
 * AdmsValPassword Classe. Responsible for validating the password. 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsValPassword
{

    private string $password;
    private bool $result;

    function getResult(): bool {
        return $this->result;
    }

    public function validatePassword($password) {
        $this->password = (string) $password;

        if (stristr($this->password, "'")) {
            $_SESSION['msg'] = "Erro: Caracter ( ' ) utilizado na senha inválido!";
            $this->result = false;
        } else {
            if (stristr($this->password, " ")) {
                $_SESSION['msg'] = "Erro: Proibido utilizar espaço em branco no campo senha!";
                $this->result = false;
            } else {
                $this->valExtensPassword();
            }
        }
    }

    private function valExtensPassword() {
        if ((strlen($this->password) < 6)) {
            $_SESSION['msg'] = "Erro: A senha deve ter no mínimo 6 caracteres!";
            $this->result = false;
        } else {
            $this->valValuePassword();
        }
    }

    private function valValuePassword() {
        if (preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$/', $this->password)) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "Erro: A senha deve ter letras e números!";
            $this->result = false;
        }
    }

}

?>
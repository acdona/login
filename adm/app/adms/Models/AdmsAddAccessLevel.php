<?php
namespace App\adms\Models;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsAddAccessLevel Model. Responsible for adding a access level.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsAddAccessLevel
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
            $this->add();
        } else {
            $this->result = false;
        }
    }

    private function add() {
        $this->data['created'] = date("Y-m-d H:i:s");

        $createAccessLevel = new \App\adms\Models\helper\AdmsCreate();
        $createAccessLevel->exeCreate("adms_access_levels", $this->data);

        if ($createAccessLevel->getCreateResult()) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Nível de acesso cadastrado com sucesso!</div>";
            $this->result = true;
        }else {
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Erro: Nível de acesso não cadastrado!</div>";
            $this->result = false;
        }

    }
}

?>
<?php

namespace App\adms\Controllers;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of OrderAccessLevels
 *
 * @author Celke
 */
class OrderAccessLevels
{

    private $pag;
    private $id;

    public function index($id = null) {
        $this->id = (int) $id;

        $this->pag = filter_input(INPUT_GET, "pag", FILTER_SANITIZE_NUMBER_INT);

        if (!empty($this->id) AND (!empty($this->pag))) {
            $orderAccessLevels = new \App\adms\Models\AdmsOrderAccessLevels();
            $orderAccessLevels->orderAccessLevels($this->id);
            $urlDestino = URLADM . 'list-access-levels/index/' . $this->pag;
            header("Location: $urlDestino");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Nível de acesso encontrado!</div>";
            $urlDestino = URLADM . 'list-access-levels/index';
            header("Location: $urlDestino");
        }
    }

}

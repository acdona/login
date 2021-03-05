<?php

namespace App\adms\Models;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of AdmsOrderAccessLevels
 *
 * @author Celke
 */
class AdmsOrderAccessLevels
{

    private $resultadoBd;
    private bool $resultado;
    private int $id;
    private array $dados;
    private $resultadoBdPrev;

    function getResultado(): bool {
        return $this->resultado;
    }

    function getResultadoBd() {
        return $this->resultadoBd;
    }

    public function orderAccessLevels($id = null) {
        $this->id = (int) $id;
        $viewAccessLevels = new \App\adms\Models\helper\AdmsRead();
        $viewAccessLevels->fullRead("SELECT id, order_levels
                FROM adms_access_levels
                WHERE id=:id 
                AND order_levels >:order_levels
                LIMIT :limit", "id={$this->id}&order_levels=" . $_SESSION['order_levels'] . "&limit=1");

        $this->resultadoBd = $viewAccessLevels->getReadingResult();
        if ($this->resultadoBd) {
            $this->viewPrevAccessLevel();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Nível de acesso não encontrado!</div>";
            $this->resultado = false;
        }
    }

    private function viewPrevAccessLevel() {
        $prevAccessLevels = new \App\adms\Models\helper\AdmsRead();
        $prevAccessLevels->fullRead("SELECT id, order_levels
                FROM adms_access_levels
                WHERE order_levels <:order_levels 
                AND order_levels >:order_levels_user
                ORDER BY order_levels DESC
                LIMIT :limit", "order_levels={$this->resultadoBd[0]['order_levels']}&order_levels_user=" . $_SESSION['order_levels'] . "&limit=1");

        $this->resultadoBdPrev = $prevAccessLevels->getReadingResult();
        if ($this->resultadoBdPrev) {
            $this->editMoveDown();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Nível de acesso não encontrado!</div>";
            $this->resultado = false;
        }
    }

    private function editMoveDown() {
        $this->dados['order_levels'] = $this->resultadoBd[0]['order_levels'];
        $this->dados['modified'] = date("Y-m-d H:i:s");

        $moveDown = new \App\adms\Models\helper\AdmsUpdate();
        $moveDown->exeUpdate("adms_access_levels", $this->dados, "WHERE id=:id", "id={$this->resultadoBdPrev[0]['id']}");

        if ($moveDown->getResult()) {
            $this->editMoveUp();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Ordem do nível de acesso não editado com sucesso!</div>";
            $this->resultado = false;
        }
    }

    private function editMoveUp() {
        $this->dados['order_levels'] = $this->resultadoBdPrev[0]['order_levels'];
        $this->dados['modified'] = date("Y-m-d H:i:s");

        $moveDown = new \App\adms\Models\helper\AdmsUpdate();
        $moveDown->exeUpdate("adms_access_levels", $this->dados, "WHERE id=:id", "id={$this->resultadoBd[0]['id']}");

        if ($moveDown->getResult()) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Ordem do nível de acesso editado com sucesso!</div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Ordem do nível de acesso não editado com sucesso!</div>";
            $this->resultado = false;
        }
    }

}

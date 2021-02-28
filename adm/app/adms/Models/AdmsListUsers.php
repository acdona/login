<?php
namespace App\adms\Models;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsListUsers Model responsible for listing the users.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsListUsers
{
     /** Registration varoables, which bring the pagination.
     * 
     */
    private int $pag;    
    private int $limitResult = 5;
    private string $resultPg;

    /** @var array $databaseResult Receives the result form the database. */
    private array $databaseResult;

    /** @var bool $result Checks whether the database query worked. */
    private bool $resulta;

    function getResult(): bool {
        return $this->result;
    }

    function getDatabaseResult() {
        return $this->databaseResult;
    }

    function getResultPg() {
        return $this->resultPg;
    }

    public function listUsers($pag = null) {
        
        $this->pag = (int) $pag;
        $pagination = new \App\adms\Models\helper\AdmsPagination(URLADM . 'list-users/index');

        $pagination->condition($this->pag, $this->limitResult);
        $pagination->pagination("SELECT COUNT(usu.id) AS num_result 
                                FROM adms_users usu
                                ");
        $this->resultPg =$pagination->getResult();


        $ListUsers  = new \App\adms\Models\helper\AdmsRead();
        $ListUsers->fullRead("SELECT usu.id, usu.name, usu.email,
                              sit.name name_sit,
                              cor.color
                               FROM adms_users usu
                               LEFT JOIN adms_sits_users AS sit ON sit.id=usu.adms_sits_user_id
                               LEFT JOIN adms_colors AS cor ON cor.id = sit.adms_color_id
                               LIMIT :limit OFFSET :offset", "limit={$this->limitResult}&offset={$pagination->getOffset()}
                               ");
        
        $this->databaseResult = $ListUsers->getReadingResult();
        if($this->databaseResult) {
            $this->result = true;
        }else{
            $_SESSION['msg'] = "Nenhum usuário encontrado!<br>";
            $this->result = false;
        }    
    }

}

?>
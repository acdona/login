<?php
namespace App\adms\Models;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * AdmsListAccessLevels Model. Responsible for listing the access levels.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsListAccessLevels
{
    /** Variables responsible for the pagnation 
     * ------------------------------------------------------------------------------------------- */
    /** @var int $pag Receives an integer referring to the page number.                            */
    private $pag;   
    /** @var int $limitResult Receives an integer, referring to how many records are to be viewed. */ 
    private $limitResult = 5;
    /** @var int $resultPg Receives an integer, refferrinf to how many records are in the database */
    private $resultPg;
    /** ------------------------------------------------------------------------------------------ */

    /** @var array $databaseResult Receive the result from the database. */
    private array $databaseResult;

    /** @var bool $result Checks whetter the database query worked.. */
    private bool $result;

    function getResult(): bool {
        return $this->result;
    }

    function getDatabaseResult() {
        return $this->databaseResult;
    }

    function getResultPg() {
        return $this->resultPg;
    }

    public function ListAccessLevels($pag = null) {

        $this->pag = (int) $pag;
        $pagination = new \App\adms\Models\helper\AdmsPagination(URLADM . 'list-access-levels/index');

        $pagination->condition($this->pag, $this->limitResult);
        $pagination->pagination("SELECT COUNT(lev.id) AS num_result FROM adms_access_levels lev");
        $this->resultPg =$pagination->getResult();


        $ListAccessLevels  = new \App\adms\Models\helper\AdmsRead();
        $ListAccessLevels->fullRead("SELECT id, name, order_levels
                               FROM adms_access_levels
                               LIMIT :limit OFFSET :offset", "limit={$this->limitResult}&offset={$pagination->getOffset()}
                               ");

        $this->databaseResult = $ListAccessLevels->getReadingResult();
        if($this->databaseResult) {
            $this->result = true;
        }else{
            $_SESSION['msg'] = "Nenhum nível de acesso encontrado!<br>";
            $this->result = false;
        }    
    }

}

?>
<?php
namespace App\adms\Models;

/**
 * AdmsError Models Responsible for errorpage 
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsError
{

    /** @var array $dataError Receives data that is returned from the database */
    private array $dataError;

    public function view() {
        
        // $viewError = new \App\adms\Models\helper\AdmsRead();
        // $viewError->fullRead("SELECT title_error, description, image_error
        //         FROM adms_errors
        //         LIMIT :limit", "limit=1");
        // $this->dataError = $viewError->getResult();
        // return $this->dataError[0];
        echo "Passou pela Models de Erro!";
        return;
    }

}

?>
    

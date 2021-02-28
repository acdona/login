<?php
namespace App\adms\Controllers;

if (!defined('R4F5CC')) { 
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Login Controller Responsible for loggin user.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class Login
{
    /** @var array $data Receives the data that must be sent to VIEW. */
    private $data;
    /** @var array $formData Receives the data send by the form. */
    private $formData;

    public function index() {
    
        
            $this->formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);  
        

        if (!empty($this->formData['SendLogin'])) {
            
            $valLogin= new \App\adms\Models\AdmsLogin();
            $valLogin->login($this->formData);
            
            if($valLogin->getResult()) {        
              
                $urlDestiny = URLADM . "dashboard/index";
                header("Location: $urlDestiny");

            }else{
                $this->data['form'] = $this->formData;
            }            
        }
        
       //$this->data = [];

        $loadView = new \Core\ConfigView("adms/Views/login/access", $this->data);
        
        $loadView->renderLogin();
    }
    

}

?>
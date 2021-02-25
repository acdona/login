<?php
namespace App\adms\Controllers;

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

    private array $data;
    private $dataForm;

    public function access() {
        
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (!empty($this->dataForm['SendLogin'])) {
            $valLogin= new \App\adms\Models\AdmsLogin();
            $valLogin->login($this->dataForm);
            if($valLogin->getResult()){
                
                $urlDestiny = URLADM . "dashboard/index";
                header("Location: $urlDestiny");
                
            }else{
                $this->data['form'] = $this->dataForm;
            }            
        }

        $this->data = [];

        $loadView = new \Core\ConfigView("adms/Views/login/access", $this->data);
        $loadView->render();
    }
    

}

?>
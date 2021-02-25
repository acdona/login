<?php
namespace Core;

/**
 * LoadAdmPage Responsible for checking whether the page is public or restricted.
 * 
 * @author ACD
 */
class LoadAdmPage
{
 
    private string $urlController;
    private string $urlMethod;
    private string $urlParameter;
    private string $class;
    private $publicPage;
    private array $restrictedPage;
     
    public function loadPage($urlController = null, $urlMethod = null, $urlParameter = null){
        $this->urlController = $urlController;
        $this->urlMethod = $urlMethod;
        $this->urlParameter = $urlParameter;
        
        $this->publicPage();

        if (class_exists($this->class)) {

            $this->loadMethod();
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
            $this->urlMethod = $this->slugMetodo(METHOD);
            $this->urlParameter = "";
            $this->class = "\\App\\adms\\Controllers\\" . $this->urlController;
            $this->loadMethod();
        }   
    }    
       
    private function loadMethod() {
        $classLoad = new $this->class();
        if(method_exists($classLoad, $this->urlMethod)){
            $classLoad->{$this->urlMethod}($this->urlParameter);
            
        }else{
            //die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM . "!<br>");
           
            $urlDestiny = URLADM . "error/index";
            header("Location: $urlDestiny");
        }        
    }

    private function publicPage() {
        $this->publicPage = ["Login"];

        if(in_array($this->urlController, $this->publicPage)) {
            $this->class = "\\App\adms\\Controllers\\" . $this->urlController;
        } else {
            $this->restrictedPage();
        }
    }

    private function restrictedPage() {
        $this->restrictedPage = ["Dashboard"];

        if(in_array($this->urlController, $this->restrictedPage)) {
            $this->checkLogin();
        } else {
           // $_SESSION['msg'] = "Erro: Página não encontrada67!!<br>";
            $urlDestiny = URLADM . "error/index";
            header("Location: $urlDestiny");
        }
    }

    private function checkLogin() {
        if(isset($_SESSION['user_id']) AND isset($_SESSION['user_name']) AND isset($_SESSION['user_email'])) {
            $this->class = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {
            $_SESSION['msg'] = "Erro: Página não encontrada!<br>";
            $urlDestiny = URL . "home/index";
            header("Location: $urlDestiny");
        }
    }

    private function slugController($slugController) {
        // Convert to lower case
        $this->slugController = strtolower($slugController);
        // Convert to hyphen the blanck space
        $this->slugController = str_replace("-", " ", $this->slugController);
        // Convert the first letter of each word to uppercase
        $this->slugController = ucwords($this->slugController);
        // Remove white space
        $this->slugController = str_replace(" ", "", $this->slugController);

        return $this->slugController;
    }

    private function slugMetodo($slugMetodo) {
        $this->slugMetodo = $this->slugController($slugMetodo);
        //Convert the first letter to lowercase
        $this->slugMetodo = lcfirst($this->slugMetodo);

        return $this->slugMetodo;
    }
} 
?>
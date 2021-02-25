<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" , shirink-to-fit=no>
    <title>AMACD - Login</title>
</head>
<body>
<?php
 
 require './vendor/autoload.php';
        
 use Core\ConfigController as Login;
 $url = new Login();
 $url->load();
 
?>
</body>
</html>


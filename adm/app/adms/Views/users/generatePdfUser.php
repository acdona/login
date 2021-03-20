<?php
if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
use Dompdf\Dompdf;

if(isset($this->data)){
    $listUsers = $this->data;

}
$listUsers = '<h1 style="text-align: center;">Celke - Listar Usuários</h1>';
$listUsers .= '<table border=1 style="text-align: center; width:100%;"';  
$listUsers .= '<thead>';
$listUsers .= '<tr>';
$listUsers .= '<th>ID</th>';
$listUsers .= '<th>Nome</th>';
$listUsers .= '<th>E-mail</th>';
$listUsers .= '</thead>';
$listUsers .= '<tbody>';

foreach ($this->data as $listUser) {
    extract($listUser);
   
    $listUsers .= '<tr><td>'.$id . "</td>";
    $listUsers .= '<td>'.$name . "</td>";
    $listUsers .= '<td>'.$email. "</td></tr>";
}

$listUsers .= '</tbody>';
$listUsers .= '</table';

$dompdf = new Dompdf();
$dompdf->loadHtml($listUsers);
$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream("listar_usuarios.pdf", array("Attachment" => true));
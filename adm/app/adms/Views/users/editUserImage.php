<?php
if(!defined('R4F5CC')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if (isset($this->data['form'])) {
    $formData = $this->data['form'];
}

if (isset($this->data['form'][0])) {
    $formData = $this->data['form'][0];
}

echo "<h3>Editar a Imagem do Usuário</h3>";

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<span class="msg"></span>
<form id="edit_img" method="POST" action="" enctype="multipart/form-data">    
    <input name="id" type="hidden" id="id" value="<?php
    if (isset($formData['id'])) {
        echo $formData['id'];
    }
    ?>">

    <input name="image" type="hidden" value="<?php
    if (isset($formData['image'])) {
        echo $formData['image'];
    }
    ?>">

    <label>Imagem:*</label>
    <input name="new_image" type="file" id="new_image"><br><br>

    <?php
    if (isset($formData['image']) AND (!empty($formData['image'])) AND (file_exists('app/adms/assets/images/users/' . $formData['id'] . '/' . $formData['image']))) {
        $old_image = URLADM . 'app/adms/assets/images/users/' . $formData['id'] . '/' . $formData['image'];
    } else {
        $old_image = URLADM . 'app/adms/assets/images/users/icon_user.png';
    }
    ?>

    <img src="<?php echo $old_image; ?>" alt="Imagem do perfil" id="preview-img" style="width: 100px; height: 100px">

    <p>( * ) Campos obrigatórios</p><br>

    <input name="EditUserImage" type="submit" value="Salvar">  
</form>


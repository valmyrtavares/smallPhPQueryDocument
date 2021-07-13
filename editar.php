<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new  UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $usuario = $usuarioDao->findById($id);  
   
}
if($usuarioDao===false){
    header("Location:index.php");
    exit;
}
?>
<h1>Editar Usuario</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>">
    <lable>
        Nome </br>
        <input type="text" name="name" value="<?=$usuario->getNome();?>" />
    </lable>
    <br /><br />
    <lable>
        Email </br>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>" /> 
    </lable><br /><br />
    <input type="submit" value="Enviar" />
</form>
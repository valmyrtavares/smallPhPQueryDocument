<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuario = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

echo $id. "   " .$name. "   " .$email;


if($id && $name && $email){

    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id ");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->execute();  
    header("Location: index.php");
    exit;
}else{
    header("Location: editar.php");
}
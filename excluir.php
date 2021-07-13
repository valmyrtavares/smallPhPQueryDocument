<?php
require 'config.php';
$id = filter_input(INPUT_GET, 'id');
echo "ID: " .$id;
if($id){
    $sql = $pdo->prepare("DELETE from usuarios WHERE id = :id ");
    $sql->bindValue(':id', $id);
    $sql->execute();
}

    header('Location: index.php');
    exit;


<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

// $lista = [];
// $sql = $pdo->query("SELECT * FROM usuarios");
// if ($sql->rowCount() > 0) {
//     $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
// }


?>

<a href="adicionar.php">Adicionar Post</a>
<table border="1" width=100%>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $item): ?>
    <tr>
        <td><?=$item->getId(); ?></td>
        <td><?=$item->getNome(); ?></td>
        <td><?=$item->getEmail(); ?></td>
        <td>
            <a href="editar.php?id=<?=$item->getId();?>">[ EDITAR ]</a>
            <a href="excluir.php?id=<?=$item->getId();?>" onclick="return confirm('Tem certeza que quer excluir?')">[ EXCLUIR ]</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<?php

//acesse data bases
require 'config.php';
require './dao/UsuarioDAOMysql.php';
$usuariosDAO = new UsuarioDAOMsql($pdo);
$lista = $usuariosDAO->findAll();

?>
<a href="adicionar.php">adicionar usuario</a>
<table border="1" width="100%">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>açoes</th>
  </tr>
  <?php foreach ($lista as $usuario) : ?>
    <tr>
      <td><?= $usuario->getId(); ?></td>
      <td><?= $usuario->getNome(); ?></td>
      <td><?= $usuario->getEmail(); ?></td>
      <td>
        <a href="editar.php?id= <?= $usuarios->getId(); ?>">[EDITAR]</a>
        <a href="excluir.php?id= <?= $usuarios->getId(); ?>" onclick=" return confirm('Tem certeza que deseja excluir seu perfil? ')">[EXCLUIR]</a>

      </td>
    </tr>
  <?php endforeach ?>

</table>
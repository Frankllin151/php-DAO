<?php
require 'config.php';
$info = [];
$Id = filter_input(INPUT_GET, 'id');
if ($Id) {
  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE  id= :id");
  $sql->bindValue(':id', $Id);
  $sql->execute();
  if ($sql->rowCount() > 0) {
    $info = $sql->fetch(PDO::FETCH_ASSOC);
  } else {
    header("Location: index.php");
  }
} else {
  header("Location: index.php");
  exit;
}
?>
<h1>Editar</h1>
<form action="editar_action.php" method="POST">
  <input type="hidden" name="id" value="<?= $info['id'] ?>">
  <label for="">
    Nome: <br />
    <input name="nome" type="text" value="<?= $info['nome'] ?>" />
  </label> <br>
  <label for="">
    Email: <br />
    <input name="email" type="email" value="<?= $info['email'] ?>" />
  </label>
  <br />
  <br />
  <input type="submit" value="Salve" />
</form>
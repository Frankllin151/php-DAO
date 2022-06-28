<?php
require 'config.php';
$info = [];
$Id = filter_input(INPUT_GET, 'id');
if ($Id) {
  $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
  $sql->bindValue(':id', $Id);
  $sql->execute();
}
header("Location: index.php");
exit;

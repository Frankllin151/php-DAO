<?php
require 'config.php';
$Id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($Id && $name && $email) {
  $sql = $pdo->prepare("UPDATE usuarios SET  nome = :name , email = :email WHERE id = :id");
  $sql->bindValue(':id', $Id);
  $sql->bindValue(':name', $name);
  $sql->bindValue(':email', $email);
  $sql->execute();
  header('Location: index.php');
  exit;
} else {

  header('Location: adicionar.php');
  exit;
}

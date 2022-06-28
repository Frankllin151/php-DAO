<?php
require 'config.php';
require './dao/UsuarioDAOMysql.php';
$usuariosDAO = new UsuarioDAOMsql($pdo);
$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($name && $email) {

  if ($usuariosDAO->findByemail($email) === false) {
    $novoUsuario = new Usuario;
    $novoUsuario->setNome($name);
    $novoUsuario->setEmail($email);
    $usuariosDAO->add($novoUsuario);
    header('Location: index.php');
    exit;
  } else {
    header("Location: adicionar.php");
    exit;
  }




  header("Location: adicionar.php");
  exit;
} else {
  header("Location: adicionar.php");
  exit;
}

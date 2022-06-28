<?php
require_once './models/Usuario.php';
class UsuarioDAOMsql implements UsuarioDAO
{
  private  $pdo;
  public function __construct($driver)
  {
    $this->pdo = $driver;
  }
  public function add(Usuario $u)
  {
    $sql = $this->pdo->prepare('INSERT INTO  usuarios (nome, email) VALUES (:nome, :email)');
    $sql->bindValue(':nome', $u->getNome());
    $sql->bindValue(':email', $u->getEmail());
    $sql->execute();
    $u->setId($this->pdo->lastInsertId());
    return $u;
  }
  public function findAll()
  {
    $array = [];
    $sql = $this->pdo->query('SELECT * FROM usuarios ');
    if ($sql->rowCount() > 0) {
      $data = $sql->fetchAll();
      foreach ($data as $item) {
        $u = new Usuario();
        $u->setId($item['id']);
        $u->setNome($item['nome']);
        $u->setEmail($item['email']);
        $array = $u;
      }
    }
    return $array;
  }

  public function findByemail($email)
  {
  }
  public function findById($id)
  {
  }
  public function update(Usuario $u)
  {
  }
  public function delete($id)
  {
  }
}

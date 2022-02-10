<?php

class CadastroModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function store($infos)
  {

    $this->db->prepare("INSERT INTO  usuarios (cpf, nascimento, email, nome, senha) VALUES (:cpf, :nascimento, :email, :nome, :senha)");
    $this->db->bindValue(':email', $infos['email']);

    $this->db->execute();
  }
}

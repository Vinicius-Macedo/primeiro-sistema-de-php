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

    $this->db->query("INSERT INTO  usuarios (email,nome,senha) VALUES (:email, :nome, :senha)");
    $this->db->bind('email', $infos['email']);
    $this->db->bind('nome', $infos['name']);
    $this->db->bind('password', $infos['password;']);

    $this->db->execute();
  }
}

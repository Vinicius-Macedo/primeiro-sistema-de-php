<?php

class CadastroModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }


  // USE DATE_SQL, PASSWORD_SQL, e CPF_SQL
  public function store($infos)
  {

    $this->db->prepare("INSERT INTO  usuarios (cpf, nascimento, email, nome, senha) VALUES (:cpf, :nascimento, :email, :nome, :senha)");

    $this->db->bindValue(':cpf', $infos['cpf_sql']);
    $this->db->bindValue(':nascimento', $infos['date_sql']);
    $this->db->bindValue(':email', $infos['email']);
    $this->db->bindValue(':nome', $infos['name']);
    $this->db->bindValue(':senha', $infos['password_sql']);

    $this->db->execute();
  }
}

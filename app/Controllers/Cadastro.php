<?php

class Cadastro extends Controller
{

  public function index()
  { 
    $infos['cpf_error'] = '';

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($form)) :
      echo "<hr>if<hr>";
      $infos = [
        'cpf' => trim($form['cpf']),
        'date' => trim($form['date']),
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => trim($form['password']),
        'passwordConfirm' => trim($form['passwordConfirm']),
      ];
      // EXISTE NO IF APENAS
      if (empty($form['cpf'])) :
        echo 'if do if<hr>';
        $infos['cpf_error'] = 'Insira um CPF válido';
      endif;

    var_dump($form);
    else :
      echo "<hr>else<hr>";
      $infos = [
        'cpf' => '',
        'date' => '',
        'name' => '',
        'email' => '',
        'password' => '',
        'passwordConfirm' => '',
      ];
    endif;

    $infos['isso_exibe'] = 'exibiu';

    $this->view('Templates/headOnly');
    $this->view('Pages/cadastro', $infos);
    $this->view('Templates/footerScriptForm');
  }
}


    // if (empty($form['date'])) :
      //   $infos['date_error'] = 'Insira uma data válida.';
      // endif;

      // if (empty($form['name'])) :
      //   $infos['name_error'] = 'Insira um nome válido.';
      // endif;

      // if (empty($form['email'])) :
      //   $infos['email_error'] = 'Insira um email válido.';
      // endif;

      // if (empty($form['password'])) :
      //   $infos['password_error'] = 'Insira uma senha forte com letras maiúsculas, minúsculas e números.';
      // endif;

      // if (empty($form['passwordConfirm'])) :
      //   $infos['passwordConfirm_error'] = 'As senhas não correspondem.';
      // endif;

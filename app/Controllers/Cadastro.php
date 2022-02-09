<?php

class Cadastro extends Controller
{


  public function __construct()
  {
    $this->cadastroModel = $this->model('CadastroModel');
  }

  public function index()
  {
    
    // TODOS OS INDEXES => TRUE PARA SER ENVIADO AO BANCO DE DADOS
    $formFields = [];

    // CHECA E RETIRA OS ESPAÇOS DE TODOS OS INPUTS
    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($form)) :
      $infos = [
        'cpf' => trim($form['cpf']),
        'date' => trim($form['date']),
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => $form['password'],
        'passwordConfirm' => $form['passwordConfirm'],
      ];

      // VALIDA OS INPUTS, CASO ELES PASS
      if (!CheckForm::cpf($infos['cpf'])) :
        $infos['cpf_error'] = 'Insira um CPF válido';
        $formFields[0] = false;
      else :
        $infos['cpf_error'] = '';
        $formFields[0] = true;
      endif;

      if (!CheckForm::date($infos['date'])) :
        $infos['date_error'] = 'Insira uma data válida';
        $formFields[1] = false;

      else :
        $infos['date_error'] = '';
        $formFields[1] = true;
      endif;

      if (!CheckForm::name($infos['name'])) :
        $infos['name_error'] = 'Insira um nome válido';
        $formFields[2] = false;

      else :
        $infos['name_error'] = '';
        $formFields[2] = true;
      endif;

      if (!CheckForm::email($infos['email'])) :
        $infos['email_error'] = 'Insira um email válido';
        $formFields[3] = false;

      else :
        $infos['email_error'] = '';
        $formFields[3] = true;
      endif;

      if (!CheckForm::password($infos['password'])) :
        $infos['password_error'] = 'A senha deve ter no mínimo 8 digitos com letras e números.';
        $formFields[4] = false;

      else :
        $infos['password_error'] = '';
        $formFields[4] = true;
      endif;

      if (!CheckForm::passwordConfirm($infos['password'], $infos['passwordConfirm'])) :
        $infos['passwordConfirm_error'] = 'As senhas não correspondem';
        $formFields[5] = false;
      else :
        $infos['passwordConfirm_error'] = '';
        $formFields[5] = true;
      endif;

      
    else :
      $infos = [
        'cpf' => '',
        'date' => '',
        'name' => '',
        'email' => '',
        'password' => '',
        'passwordConfirm' => '',
        'cpf_error' => '',
        'date_error' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'passwordConfirm_error' => '',
      ];
    endif;

    // CHECA SE TOODOS OS CAMPOS DO ARRAY SÃO TRUE
    if(count(array_unique($formFields)) === 1):
      if ($this->cadastroModel->store($infos)):
      else:
        die("Erro ao armazenar usuario no banco de dados");
      endif;
    endif;

    $this->view('Templates/headOnly');
    $this->view('Pages/cadastro', $infos);
    $this->view('Templates/footerScriptForm');
  }
}


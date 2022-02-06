<?php 

class Login extends Controller {

  public function index() {
    $this->view('Templates/headOnly', ['titulo' => 'Login']);
    $this->view('Pages/login');
    $this->view('Templates/footerScriptForm');
  }

}

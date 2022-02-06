<?= $infos['isso_exibe'] ?>
<?= $infos['cpf_error'] ? 'is-invalid':''?>

<section class="hero-section">
  <div class="form-container">
    <h2 class="h2-title">Cadastro</h2>
    <form name="form" action="<?= URL ?>cadastro" method="POST" class="form-principal cadastro" novalidate name="signUp">
      <div class="field-container">
        <input value="<?= $infos['cpf'] ?>" oninput="mascara(this)" required type="text" class="input cpf" name="cpf">
        <label>CPF</label>
        <span class="error"></span>
      </div>
      <div class="field-container">
        <input value="<?= $infos['date'] ?>" class="input data" oninput="mascara2(this)" required type="text" name="date">
        <label>Data de nascimento (dd/mm/aaaa)</label>
        <span class="error"></span>
      </div>
      <div class="field-container">
        <input value="<?= $infos['name'] ?>" class="input nome" required type="text" name="name">
        <label>Nome Completo</label>
        <span class="error"></span>
      </div>
      <div class="field-container">
        <input value="<?= $infos['email'] ?>" class="input email" required type="email" name="email">
        <label>Email</label>
        <span class="error"></span>
      </div>
      <div class="field-container">
        <input value="<?= $infos['password'] ?>" class="input password a" required type="password" name="password">
        <i class="icon fas fa-eye"></i>
        <label>Senha</label>
        <span class="error"></span>
      </div>
      <div class="field-container">
        <input value="<?= $infos['passwordConfirm'] ?>" class="input password b" required type="password" name="passwordConfirm">
        <label>Confirmação da Senha</label>
        <i class="icon fas fa-eye"></i>
        <span class="error"></span>
      </div>
      <input class="btn primary" type="submit" value="Cadastrar">
    </form>
    <a class="comeback" href="home">voltar</a>
  </div>
</section>
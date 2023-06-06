<?php
require_once('templates/header.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>Registro</h2>
      <form method="post" action="auth_user.php">
        <input type="hidden" name="type" value="register">
        <div class="form-group">
          <label for="registerName">Nome:</label>
          <input type="text" class="form-control" id="registerName" name="name" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="registerEmail">Email</label>
          <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Digite seu email">
        </div>
        <div class="form-group">
          <label for="registerPassword">Senha</label>
          <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Digite sua senha">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>
    <div class="col-md-6">
      <h2>Login</h2>
      <form  method="post" action="auth_user.php">
      <input type="hidden" name="type" value="login">
        <div class="form-group">
          <label for="loginEmail">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
        </div>
        <div class="form-group">
          <label for="loginPassword">Senha</label>
          <input type="password" class="form-control" id="email" name="password" placeholder="Digite sua senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
  </div>
</div>

<?php
require_once('templates/footer.php');
?>

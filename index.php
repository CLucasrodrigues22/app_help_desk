<?php
  include_once 'layout/header.php';
?>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form method="post" action="valida_login.php">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div>
                <?php
                  if(isset($_GET['login']) && $_GET['login'] == 'erro') {

                ?>
                  <div class="text-danger">
                      Usuário ou senha inválido(s)
                  </div>
                <?php } ?>

                <?php
                  if(isset($_GET['login']) && $_GET['login'] == 'erroAutenticacao') {

                ?>
                  <div class="text-danger">
                      Erro na autenticação, faça login novamente!
                  </div>
                <?php } ?>
                
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
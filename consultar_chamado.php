<?php
  require_once 'includes/valida_acesso.php';
  include_once 'layout/header.php';
?>

<?php

  //chamados
  $chamados = array();


  //abrir o arquivo.hd
  $arquivo = fopen('../../app_help_desk_privado/arquivo.hd', 'r');

  //enquanto houver registros (linhas) a serem recuperados
  while(!feof($arquivo)) { //testa pelo fim de um arquivo
    //linhas  
    $registro = fgets($arquivo);

    //explode dos detalhes do registro para verificar o id do usuário responsável pelo cadastro
    $registro_detalhes = explode('#', $registro);

    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['perfil'] == 2) {

      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if($_SESSION['id'] != $registro_detalhes[0]) {
        continue; //não faz nada

      } else {
        $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
      }

    } else {
      $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
    }

  }

  //fechar o arquivo aberto
  fclose($arquivo);


?>
  <body>

    <?php
      include_once 'layout/menu.php';
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php foreach ($chamados as $chamado) { ?>

                <?php
                  $chamado_dados = explode('#', $chamado);

                  if(count($chamado_dados) < 3) {
                    continue;
                  }
                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                    <p class="card-text"><?=$chamado_dados[3]?></p>

                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
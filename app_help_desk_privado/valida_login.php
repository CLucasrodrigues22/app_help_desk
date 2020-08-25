<?php
    session_start();

    //variavel que verifica se a autenticacao foi realizada

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    //usuarios do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '1234', 'perfil' => 1),
        array('id' => 2, 'email' => 'user@teste.com', 'senha' => 'abcd', 'perfil' => 1),
        array('id' => 3, 'email' => 'jose@teste.com', 'senha' => 'dbca', 'perfil' => 2),
        array('id' => 4, 'email' => 'maria@teste.com', 'senha' => '4321', 'perfil' => 2),
    );


    foreach ($usuarios_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil'];
        }
        echo '<hr>';
    }

    if ($usuario_autenticado) {
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION[ 'id'] = $usuario_id;
        $_SESSION['perfil'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }

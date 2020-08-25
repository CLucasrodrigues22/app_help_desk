<?php

    session_start();
    // //estamos trabalhadno na montagem do texto
    // foreach ($_POST as $indice => $valor) {
    //     $campos[$indice] = str_replace('#', '-', $_POST[$indice]);
    // }

    // $texto = implode("-", $_POST);

    // //criando o arquivo atraves da função nativa fopen
    // $arquivo = fopen('arquivo.hd', 'a' );
    // //escrevendo o texto no aquivo criado
    // fwrite($arquivo, $texto . PHP_EOL);
    // //fechando o arquivo
    // fclose($arquivo);

    // // echo $texto;


    
    //estamos trabalhadno na montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . ' # ' . $categoria . ' # ' . $descricao . PHP_EOL;

    //criando o arquivo atraves da função nativa fopen
    $arquivo = fopen('../../app_help_desk_privado/arquivo.hd', 'a');
    //escrevendo o texto no aquivo criado
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);

    header('Location: home.php');

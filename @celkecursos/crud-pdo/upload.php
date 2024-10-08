<?php

//Receber os dados da imagem
$dados_imagem = $_FILES['image'];

//Diretório que será salvo a imagem
$diretorio = 'imagens/';

//Gerar uma chave para o nome do arquivo
$chave = substr(md5(rand()), 0, 16);
$extensao = pathinfo($dados_imagem['name'], PATHINFO_EXTENSION);
$nome_arquivo = $chave . "." . $extensao;

//Upload do arquivo
//move_uploaded_file($dados_imagem['tmp_name'], $diretorio . $dados_imagem['name']);
move_uploaded_file($dados_imagem['tmp_name'], $diretorio . $nome_arquivo);

$retorno['success'] = true;
//$retorno['file'] = "https://celke.com.br/app/lms/assets/imagens/curso/9/curso-php-online.jpg";
//$retorno['file'] = "http://localhost/celke/imagens/" . $dados_imagem['name'];
$retorno['file'] = "http://localhost/crud_pdo_original/imagens/" . $nome_arquivo;

echo json_encode($retorno);

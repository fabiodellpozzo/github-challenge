<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';

// Receber o valor do elemento
$acessorio_id = filter_input(INPUT_POST, 'acessorio_id', FILTER_DEFAULT);
$carro_id = filter_input(INPUT_POST, 'carro_id', FILTER_DEFAULT);

// Criar a QUERY salvar o nome do acessorio no banco de dados
$query_acessorio = "INSERT INTO carros_acessorios (acessorio_id, carro_id) VALUES (:acessorio_id, :carro_id)";

// Preparar a QUERY
$cad_acessorio = $conn->prepare($query_acessorio);

// Substituir o link pelo valor
$cad_acessorio->bindParam(':acessorio_id', $acessorio_id);
$cad_acessorio->bindParam(':carro_id', $carro_id);

// Executar a QUERY
if($cad_acessorio->execute()){
    echo json_encode(['status' => true, 'mensagem' => 'Acessório salvo com sucesso!']);
}else{
    echo json_encode(['status' => false, 'mensagem' => 'Erro: Acessório não salvo!']);
}

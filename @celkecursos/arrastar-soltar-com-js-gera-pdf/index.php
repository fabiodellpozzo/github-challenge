<?php

// Criar o id do carro estático para usar como exemplo
$carro_id = 1;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/custom.css">
    <title>Arrastar e Soltar Valores</title>
</head>

<body>

    <h2 class="titulo">Cadastrar Acessórios</h2>

    <!-- Receber a mensagem de sucesso ou erro -->
    <span id="msg"></span>

    <!-- Fornecer o id do carro -->
    <span data-carro-id="<?php echo $carro_id; ?>" id="carroId"></span>

    <div class="areaDados">
        <h2>Disponivel</h2>
        <ul class="containerItem">
            <!-- Criar item disponível -->
            <!-- O atributo draggable é usado para controlar se um elemento HTML pode ser arrastado pelo usuário ou não -->
            <li draggable="true" class="itemArrastavel" data-acessorio-id="1">Ar-condicionado</li>
            <li draggable="true" class="itemArrastavel" data-acessorio-id="2">Vidro Elérico</li>
            <li draggable="true" class="itemArrastavel" data-acessorio-id="3">Direção Elétrica</li>
        </ul>
    </div>

    <div class="areaDados">
        <h2>Selecionados</h2>
        <ul class="containerItem">
            <!-- Recebe item selecionado -->
        </ul>
    </div>

    <script src="js/custom.js"></script>

</body>

</html>

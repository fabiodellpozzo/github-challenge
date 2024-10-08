<?php
session_start();
ob_start();
include_once './conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}

$query_usuario = "SELECT id, titulo, conteudo FROM posts WHERE id = $id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_usuario);
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>

        <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">


    </head>
    <body>
        <a href="index.php">Listar</a><br>
        <a href="cadastrar.php">Cadastrar</a><br>

        <h1>Editar</h1>

        <?php
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['EditUsuario'])) {
            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";

            } elseif (!filter_var($dados['conteudo'])) {

                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";

            }

            if (!$empty_input) {
                $query_up_usuario= "UPDATE posts SET titulo=:titulo, conteudo=:conteudo WHERE id=:id";
                $edit_usuario = $conn->prepare($query_up_usuario);
                $edit_usuario->bindParam(':titulo', $dados['titulo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':conteudo', $dados['conteudo'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);
                if($edit_usuario->execute()){
                    $_SESSION['msg'] = "<p style='color: green;'>Post editado com sucesso!</p>";
                    header("Location: index.php");
                }else{
                    echo "<p style='color: #f00;'>Erro: Post não editado com sucesso!</p>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" action="">
            <label>titulo: </label>
            <input type="text" name="titulo" id="titulo" placeholder="titulo" value="<?php
            if (isset($dados['titulo'])) {
                echo $dados['titulo'];
            } elseif (isset($row_usuario['titulo'])) {
                echo $row_usuario['titulo'];
            }
            ?>" ><br><br>

          



<textarea name="conteudo" id="trumbowyg-editor" rows="5">
<?php
                   if (isset($dados['conteudo'])) {
                       echo $dados['conteudo'];
                   } elseif (isset($row_usuario['conteudo'])) {
                       echo $row_usuario['conteudo'];
                   }
                   ?>

</textarea>

            <input type="submit" value="Salvar" name="EditUsuario">
        </form>



        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="dist/trumbowyg.min.js"></script>

    <script type="text/javascript" src="dist/langs/pt_br.min.js"></script>

    <script src="dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

    <script src="dist/plugins/upload/trumbowyg.upload.min.js"></script>

    <script>
        $('#trumbowyg-editor').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['upload'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['emoji']
            ],
            plugins: {
                // Add imagur parameters to upload plugin for demo purposes
                upload: {
                    serverPath: './upload.php',
                    fileFieldName: 'image',
                    headers: {
                        'Authorization': 'Client-ID xxxxxxxxxxxx'
                    },
                    urlPropertyName: 'file'
                }
            },
            autogrow: true
        });
    </script>
    </body>
</html>

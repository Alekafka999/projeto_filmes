<?php
include 'backend/conexao.php';

try{
$sql = "SELECT * FROM tb_categorias";
$comando = $conexao->prepare($sql);
$comando->execute();
$categorias = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $err) {
    //tratamento de erro
    echo "Erro ao realizar o cadastro. Erro gerado " . $err->getMessage();
}



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Filmes</title>
</head>
<body>
    <h1>Cadastro de Filmes</h1>
    <form action="processar_cadastro.php" method="POST">
        <label for="titulo">Título do Filme:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="diretor">Diretor:</label><br>
        <input type="text" id="diretor" name="diretor" required><br><br>

        <label for="">Categoria:</label>
        <select name="categoria" id="categoria"><br><br>
            <option value="1">Fantasia</option>
            <option value="2">Ação</option>
        </select>
<br><br>
        <label for="ano">Ano de Lançamento:</label><br>
        <input type="text" id="ano" name="ano" required><br><br>

        <label for="ano">Duração (em minutos):</label><br>
        <input type="number" id="ano" name="ano" required><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar Filme">
</body>
</html>
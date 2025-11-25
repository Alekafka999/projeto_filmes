<?php
include "backend/conexao.php";

try {
    $sql = "SELECT * FROM tb_categorias where ativo = 1 ORDER BY categoria";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $categorias=$comando->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $err) {
    echo "Erro ao cadastrar".$err->getMessage();
    
}

//cadastro de filmes
// se existir um post com o valor cadastrar, executa o código abaixo
if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $nome = $_POST['diretor'];
    $nome = $_POST['categoria'];
    $nome = $_POST['ano'];
    $nome = $_POST['duracao'];

    sql = "INSERT INTO tb_filmes(nome,diretor,ide_categoria,ano,duracao)VALUES('$nome','$diretor','$categoria','$ano','$duracao')";

    $comando = $conexão->prepare($sql);
    $comando->execute();
    header("Location: cadastrar_filmes.php");

}



?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes - Cadastro</title>
</head>
<body>
    <h1>Cadastro de filmes</h1>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <label for="diretor">Diretor</label>
        <input type="text" name="diretor" id="diretor" required>

        <label for="">Categoria</label>
        <select name="categoria" id="categoria" required>
            <?php
            foreach($categorias as $categoria):
            ?>
            <option value="<?php echo $categoria['id'];?>"><?php echo $categoria['categoria'];?></option>
            <?php
            endforeach;
            ?>
        </select>

        <label for="ano">Ano Lançamento</label>
        <input type="text" name="ano" id="ano" required>

        <label for="duracao">Duração (minutos)</label>
        <input type="number" name="duracao" id="duracao" required>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    
</body>
</html>
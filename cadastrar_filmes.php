<?php
include "backend/conexao.php";

try {
    $sql = "SELECT * FROM tb_categorias where ativo = 1 ORDER BY categoria";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $categorias=$comando->fetchAll(PDO::FETCH_ASSOC);
    $filmes = json_decode(file_get_contents('banco/filmes.json'), true);



} catch (PDOException $err) {
    echo "Erro ao cadastrar".$err->getMessage();
    
}

//cadastro de filmes
// se existir um post com o valor cadastrar, executa o código abaixo
if(isset($_POST['cadastrar'])){
    try{
    $nome = $_POST['nome'];
    $diretor = $_POST['diretor'];
    $categoria = $_POST['categoria'];
    $ano = $_POST['ano'];
    $duracao = $_POST['duracao'];

    $pasta = 'uploads';
    $extensao = strtolower(pathinfo($FILES['imagem']['name'], PATHINFO_EXTENSION));

    if($extensao != 'jpg' || extensao != 'png'){
    echo "Formato da imagem inválido! .jpg ou .png";
    exit;
    }

    $imagem_upload = $hash_imagem.'.'.$extensao;

    $hash_imagem = md5(uniqid($_FILES['imagem']['tmp_name'], true));

    exit;

    $sql = "INSERT INTO tb_filmes(nome,diretor,ide_categoria,ano,duracao,imagem)VALUES('$nome','$diretor','$categoria','$ano','$duracao', '$imagem_upload')";

    $comando = $conexao->prepare($sql);
    $comando->execute();
    header("Location: cadastrar_filmes.php");

} catch (PDOException $err) {
    echo "Erro ao cadastrar: ".$err->getMessage();
}


// listagem de filmes
try{
    $sql = "SELECT * FROM tb_filmes";
    $comando = $conexao->prepare($sql);
    $comando ->execute();
    $comando->

}catch(PDOException $err) {
    echo "Erro ao buscar os dados:".$err->getMessage();
}

// deletar o registro
if(isset($_POST['deletar'])){
    
        try{
            $id = $_POST['deletar'];
            $sql = 'DELETE FROM tb_filmes WHERE id=$id';
            $conexao = $conexao->prepare($sql);
            $comando->execure();
            header('Location:cadastrar_filmes.php');

        } catch (PDOException $err) {
            echo "Erro ao deletar: ".$err->getMessage();

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
        <input type="file"

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <section id="listagem">
        <h2>Filmes - Relatórios</h2>
    
        <table border = 1>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Diretor</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Duração</th>
                <th>Data Cadastro</th>
            </tr>
            <?php 
            foreach($filmes as $filme):
            ?>
            <tr>
                <td><?php echo $filme['id'];?></td>
                <td><?php echo $filme['nome'];?></td>
                <td><?php echo $filme['diretor'];?></td>
                <td><?php echo $filme['id_categoria'];?></td>
                <td><?php echo $filme['ano'];?></td>
                <td><?php echo $filme['duracao'];?></td>
                <td><?php echo $filme['data_cadastro'];?></td>
            </tr>

            <td>
                <form action="" method="post">
                    <input type="hidden" name="deletar" id="deletar" value="<?php echo $filme['id'];?>">
                    <button type="submit">
                        <i class="fa-solid fa-trash-can">
                    </i>
                    </button>
                </form>
            </td>
            <?php
            endforeach;
            ?>
        </table>
    </section>
    
</body>
</html>
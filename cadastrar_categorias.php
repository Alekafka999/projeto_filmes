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
    try{
    $categoria = $_POST['categoria'];
    $duracao = $_POST['duracao'];

    $sql = "INSERT INTO tb_categorias(categoria,duracao)VALUES('$categoria','$duracao')";

    $comando = $conexao->prepare($sql);
    $comando->execute();
    header("Location: cadastrar_categoria.php");

} catch (PDOException $err) {
    echo "Erro ao cadastrar: ".$err->getMessage();
}
}

// listagem de filmes
try{
    $sql = "SELECT * FROM tb_filmes";
    $comando = $conexao->prepare($sql);
    $comando ->execute();
    $filmes=$comando->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $err) {
    echo "Erro ao buscar os dados:".$err->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes - Cadastro de Categorias</title>
</head>
<body>
    <h1>Cadastro de Categoria dos Filmes</h1>
    <form action="" method="post">
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

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <section id="listagem">
        <h2>Categorias - Relatórios</h2>
    
        <table border = 1>
            <tr>
                <th>Id</th>
                <th>Categorias Cinematográficas</th>
                <th>Data Cadastro</th>
            </tr>
            <?php 
            foreach($categorias as $categoria):
            ?>
            <tr>
                <td><?php echo $categoria['id'];?></td>
                <td><?php echo $categoria['Categorias'];?></td>
                <td><?php echo $filme['data_cadastro'];?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
    </section>
    
</body>
</html>
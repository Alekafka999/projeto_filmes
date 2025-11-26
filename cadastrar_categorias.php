<?php
include "backend/conexao.php";

// Buscar categorias
try {
    $sql = "SELECT * FROM tb_categorias WHERE ativo = 1 ORDER BY categoria";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $categorias = json_decode(file_get_contents('banco/categorias.json'), true);
$categorias = $categorias[0];

} catch (PDOException $err) {
    echo "Erro ao buscar categorias: " . $err->getMessage();
}

// Cadastro de categorias

if(isset($_POST['cadastrar'])){
    try {
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO tb_categorias(categoria) VALUES(:categoria)";
        $comando = $conexao->prepare($sql);
        $comando->bindParam(':categoria', $categoria);
        $comando->execute();

        header("Location: cadastrar_categorias.php");
    } catch (PDOException $err) {
        echo "Erro ao cadastrar: " . $err->getMessage();
    }
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
        <input type="text" name="categoria" required>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <section id="listagem">
        <h2>Categorias - Relatórios</h2>

        <table border="1">
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Data Cadastro</th>
            </tr>

            <?php foreach($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $categoria['id']; ?></td>
                    <td><?php echo $categoria['categoria']; ?></td>
                    <td><?php echo $categoria['data_cadastro'] ?? ''; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </section>
</body>
</html>

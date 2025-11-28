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

// listagem de filmes
try {
    $sql = "SELECT * from tb_filmes";
    $comando = $conexao->prepare(query: $sql);
    $comando->execute();
    $filmes = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    echo "Ero ao buscar os dados; " .$err->getMessage();
}

    
    
    
//cadastro de filmes
// se existir um post com o valor cadastrar, executa o código abaixo
if(isset($_POST['cadastrar'])){

// captura os valores enviados via POST
try {
    $nome = $_POST['nome'];
    $diretor = $_POST['diretor'];
    $categoria = $_POST['categoria'];
    $ano = $_POST['ano'];
    $duracao = $_POST['duracao'];

//upload da imagem
//define a pasta onde irá fazer o upload da imagem
    $pasta = 'uploads';

//captura a extensão do arquivo (.png, . jpg)

$extensao = strtolower(pathinfo($FILES['imagem']['name'], PATHINFO_EXTENSION));

//valida a extensão do arquivo

if($extensao != 'jpg' && extensao != 'png'){
    echo "Formato da imagem inválido! Use JPG ou PNG";
    exit;
}

//gera um hash para imagem (nome aleatório)
$hash_imagem = md5(string: uniqid(prefi: $_FILES['imagem'], more_entropy: true));

// cria o novo nome da imagem, com o hash e extensão
$imagem_upload = $hash_imagem.'.'.$extensao;

//realiza o upload
move_uploaded_file(from: $_FILES['imagem']['tmp_name'], to: 'uploads/'.$imagem_upload);


$sql = "INSERT INTO tb_filmes(nome,diretor,ide_categoria,ano,duracao,imagem)VALUES('$nome','$diretor','$categoria','$ano','$duracao', '$imagem_upload')";

    $comando = $conexao->prepare($sql);
    $comando->execute();
    header("Location: cadastrar_filmes.php");

} catch (PDOException $err) {
    echo "Erro ao cadastrar: ".$err->getMessage();
}

//deletar o registro
if(isset($_POST['deletar'])){
    try {
        $nome = $_POST['deletar'];
        $sql = "DELETE FROM tb_flmes WHERE id=$id";
        $comando = $conexao->prepare(query: $sql);
        $comando->execute();
        header(header: "Localion:cadastrar_filmes.php");

    } catch (PDOException $err) {
        echo "Erro ao deletar: ".$err->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes - Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
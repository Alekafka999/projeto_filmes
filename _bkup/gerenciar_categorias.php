<?php
include "backend/conexao.php";

// listagem de categorias
try {
    $sql = "SELECT * FROM tb_categorias";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $categorias=$comando->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $err) {
    echo "Erro ao cadastrar".$err->getMessage();  
}



// Cadastro de Filmes
// se existir um POST com o valor cadastrar, executa o código abaixo
if(isset($_POST['cadastrar'])){
    // captura os valores enviados via POST
    try {
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO tb_categorias (categoria)VALUES('$categoria')";
        
        $comando = $conexao->prepare($sql);
        $comando->execute();
        header("Location: gerenciar_categorias.php");
    } catch (PDOException $err) {
        echo "Erro ao cadastrar: ".$err->getMessage();
    }
   

}


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes - Cadastro</title>
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>
    <h1>Cadastro de Categorias</h1>
    <form action="" method="post">
        <label for="categoria">Categoria</label>
        <input type="text" name="categoria" id="categoria" required>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <section id="listagem">
        <h2>Categorias - Relatório</h2>
        <table border=1>
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Ativo</th>
                <th>Data Cadastro</th>
            </tr>
            <?php
            foreach($categorias as $categoria):
            ?>
            <tr>
                <td><?php echo $categoria['id'];?></td>
                <td><?php echo $categoria['categoria'];?></td>
                
                    
                    <td>
                        <label class="switch">
                            <input 
                                type="checkbox" 
                                <?php 
                                    if($categoria['ativo']==1)
                                    echo "checked";
                                ?> 
                                onclick="window.location.href='backend/categoria_ativo.php?id=<?php echo $categoria['id']; ?>'">
                            <span class="slider round"></span>
                        </label>

                    </td>
                <td><?php echo $categoria['data_cadastro'];?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>

    </section>
    
    
</body>
</html>
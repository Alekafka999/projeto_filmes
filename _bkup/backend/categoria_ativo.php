<?php

try {
    include "conexao.php";
    $id = $_GET['id'];

   $sql = "UPDATE tb_categorias SET ativo = 1-ativo WHERE id =$id";
   $comando = $conexao->prepare($sql);
   $comando->execute();
   header("Location: ../gerenciar_categorias.php");

} catch (PDOException $err) {
    echo "Erro ao atualizar: ".$err->getMessage();
}



?>
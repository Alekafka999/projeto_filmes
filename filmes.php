<?php
include "backend/conexao.php";

try{
    $sql = "SELECT id, nome,image from tb_filmes";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $filmes = $comando->fetchall(PDO::FETCH_ASSOC);

} catch (PDOException $err) {
    echo "Erro ao buscar os dados: ".$err->getMessage();



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="filmes">
        <h2>Catálogo</h2>

        <section id="fantasia">
        

    <?php
        foreach ($filmes as $filme):
            
    {

        <div class="card">
            <img class="card-img" src="uploads/p_fantasia_19641_cdb93769.jpeg" alt="">
        </div>

        <?php endforeach; ?>

    </section>
</body>
</html>
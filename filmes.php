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
    <title>Catálogo de Filmes</title>
<style>
    .card-img{
        width: 100%;
        height: 350ox;
    }

    #myCarousel {
    --f-carousel-gap: 10px;
    --f-carousel-slide-width: 20%;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/carousel.min.js>

</head>
<body>

if(isset($_POST['categoria'])){
    try{
        $id = $_POST['categoria'];

        if($id =='0'){
            $sql = "SELECT id,nome,imagem from tb_filmes;

    }else{
        $sql = "SELECT id,nome,imagem from tb_filmes where id_categoria = $id";

}

        $sql= "SELECT id,nome,imagem from tb_filmes where id_categoria = $id";
        $comando = $conexao->prepare($sql);
        $comando->execute();
        $filmes = $comando->fetchALL(PDO::FETCH_ASSOC); 

    } catch (PDOException $err) {
    echo "Erro ao buscar dados: ".$err->getMessage();
    }
}

    <section id="filmes">
        <h2>Catálogo</h2>
        <form action="" method="post">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="1">Drama</option>
            </select>

            <input type="submit" value="Pesquisar">
        
        <form action=""

        <section id="fantasia">
            <div class="f-carousel" id="myCarousel">
                <?php
                    foreach($filmes as $filmes):
                ?>
                    <div class="f-carousel_slide">
                        <img class="class-img" src="uploads/<?php echo $filme['imagem'];?>">
                    </div>        

    

            <?php 
                endforeach; 
                
            ?>
        </section>
    </section>

    <script
        <script> 
            const container = document.getElementById("myCarousel");
            const options = {
            // Your custom options
            };

    <script>
        Carousel(container, options).init();
    </script>

    </section>
</body>
</html>
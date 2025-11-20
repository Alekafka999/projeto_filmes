<?php

//Arquivo de conexão com o banco de dado
try {
  // tenta realizar a conexão com o banco de dados
  define("SERVIDOR", "localhost"); 
  define("USUARIO", "root"); 
  define("SENHA", "");
  define("DATABASE", "db_filmes");   

// exemplo para exibir texto + variavel/constante (concatenação)
// echo "Olá, ". USUARIO ."! Tudo bem?";

$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".DATABASE. "; charset=UTF8mb4", USUARIO, SENHA);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setar os atributos da conexão

  echo "Conectado com sucesso!";

  } catch (PDOException $err) {
    //tratamento de erro
    echo "Erro: Conexão com o banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();


}


?>
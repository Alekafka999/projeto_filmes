<?php


try{

define("SERVIDOR","localhost");
define("USUARIO","root");
define("SENHA","");
define("BANCO","db_filmes");

$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset-utf8mb4",USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $err){

    echo "Não foi possível conectar:" . $err->getMessage();
}

?>
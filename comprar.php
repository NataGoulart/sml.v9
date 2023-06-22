<?php

session_start();
$logado=$_SESSION['logado'];
$codigo=$_GET['id_produto'];
include("conecta.php");
    
    
    
$comando = $pdo->prepare("INSERT INTO carrinho VALUES($codigo,'$logado')" );
$resultado = $comando->execute();
header("Location:car.html");
?>
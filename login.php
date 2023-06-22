<?php 
    session_start();
    $name=$_POST["nome"];
    $senha=$_POST["senha"];
    include("conecta.php");

    $comando = $pdo->prepare("SELECT * FROM cadastro WHERE usuario='$name' and senha1='$senha'");
    $resultado = $comando->execute();
    if($comando->rowCount()>0)
    {
        $_SESSION['logado']=$name;
        header("Location:index.html");
    }
    
    else {
        header("Location:ops.html");
        }
?>
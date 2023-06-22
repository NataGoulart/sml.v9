<?php
        // ATENÇÃO: o tipo da coluna na tabela deve ser MEDIUMBLOB
        include("conecta.php");

        $produto = $_POST["produto"];
        $codigo = $_POST["codigo"];

        // Lê o conteúdo do arquivo de imagem e armazena na variável $imagem
		$imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);
		
		$comando = $pdo->prepare("INSERT INTO codigos(produto,codigo,foto) VALUES(:produto,:codigo,:foto)");
        $comando->bindParam(":produto", $produto);
        $comando->bindParam(":codigo", $codigo);
        $comando->bindParam(":foto", $imagem, PDO::PARAM_LOB);
		$resultado = $comando->execute();



        
        // As linhas abaixo você usará sempre que quiser mostrar a imagem

        $comando = $pdo->prepare("SELECT * FROM codigos");
		$resultado = $comando->execute();
        while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["foto"];
            $i = base64_encode($dados_imagem);

            $produto =  $linhas["produto"];
            $codigo =  $linhas["codigo"];

            echo("PRODUTO: $produto PREÇO: $codigo  <br>");
            echo(" <img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ");
        }
		
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="salvar_imagem.css">
    <title>Smiling</title>
    <style>
    body{
        background-image:url("imagens/ceuadm.png");
        background-size: 100%;
    }
    
</style>
</head>
<body>
    
<header>
	</nav>
   <center>
   <a href="index.html"><img src="imagens/logo.png" width="370px"></a>
   <h2>NOVOS PRODUTOS</h2>
   </center> 
</header>
    
</body>
</html>

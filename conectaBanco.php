<!--A CONEXÃO COM O BANCO DE DADOS-->
<?php
    $banco = "livraria";
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($servidor, $usuario, $senha, $banco);

    // Check connection
    if ($conn->connect_error) {
      die("Não conectou!❌" . $conn->connect_error);
    }
   //echo "Conexão com sucesso!✅";
?>


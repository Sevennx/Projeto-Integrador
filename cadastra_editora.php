<!--FAZ O CADASTRO DA EDITORA-->
<?php
    require_once('conectaBanco.php');
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_editora = $_POST['nome_editora'];

    $sql = "INSERT INTO editora (nome) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome_editora);
    
    if ($stmt->execute()) {
        echo "Nova editora cadastrada com sucesso!";
        echo "<a href='index.php'><button>Voltar</button>";
    } else {
        echo "Erro: " . $stmt->error;
    }
}

$conn->close();
?>

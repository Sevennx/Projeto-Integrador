<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
</head>
<body>
<?php
require_once('conectaBanco.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pesquisa'])) {
    $termo_pesquisa = $_POST['pesquisa'];

    // Prepara a consulta SQL utilizando prepared statement para evitar SQL Injection
    $sql = "SELECT a.titulo, a.foto, a.autor, e.nome as editora, a.ano, a.preco 
            FROM acervo a 
            JOIN editora e ON a.editora_id = e.id 
            WHERE a.titulo LIKE ? OR a.autor LIKE ? OR e.nome LIKE ?";
    
    // Prepara e executa a consulta com prepared statement
    $stmt = $conn->prepare($sql);
    $termo_like = "%$termo_pesquisa%";
    $stmt->bind_param("sss", $termo_like, $termo_like, $termo_like);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Exibe os resultados
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="./img/' . $row['foto'] . '" alt="' . $row['titulo'] . '">';
            echo '<div class="mod">';
            echo '<h4><b>' . $row['titulo'] . '</b></h4>';
            echo '<h4><b>' . $row['autor'] . '</b></h4>';
            echo '<h4><b>' . $row['editora'] . '</b></h4>';
            echo '<h4><b>' . $row['ano'] . '</b></h4>';
            echo '<h4><b>$' . $row['preco'] . '</b></h4>';
            echo "<a href='index.php'><button>Voltar</button></a>";
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'Nenhum livro encontrado.';
    }

    $stmt->close();
} else {
    echo 'Por favor, forneça um termo de pesquisa.';
}

$conn->close();
?>
</body>
</html>

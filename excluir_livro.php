<!-- excluir_livro.php -->
<?php
require_once('conectaBanco.php');

if (isset($_GET['id'])) {
    $livro_id = $_GET['id'];

    // Query para excluir o livro do acervo com base no ID
    $sql = "DELETE FROM acervo WHERE id = $livro_id";

    if ($conn->query($sql) === TRUE) {
        echo "Livro excluído com sucesso.";
        echo "<a href='index.php'><button>Voltar</button></a>";
    } else {
        echo "Erro ao excluir o livro: " . $conn->error;
    }
} else {
    echo "ID do livro não especificado.";
}

$conn->close();
?>

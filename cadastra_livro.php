<!--FAZ O CADASTRO DOS LIVROS-->
<?php
        require_once('conectaBanco.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora_id = $_POST['editora'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];

    // Verifica se o campo "foto" foi enviado corretamente
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto_nome = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $destino = './img/' . $foto_nome; // Substitua pelo caminho correto

        // Move o arquivo para o destino desejado
        if (move_uploaded_file($foto_tmp, $destino)) {
            // Arquivo movido com sucesso, continuar com a inserção no banco de dados
            $sql = "INSERT INTO acervo (titulo, foto, autor, editora_id, ano, preco) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiid", $titulo, $foto_nome, $autor, $editora_id, $ano, $preco);

            if ($stmt->execute()) {
                echo "Novo livro cadastrado com sucesso!";
                echo "<a href='index.php'><button>Voltar</button></a>";
            } else {
                echo "Erro: " . $stmt->error;
            }
        } else {
            echo "Erro ao mover o arquivo para o destino.";
        }
    } else {
        echo "Erro no upload do arquivo.";
    }
}

$conn->close();

?>


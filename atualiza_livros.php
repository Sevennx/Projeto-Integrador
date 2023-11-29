<?php
require_once('conectaBanco.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $livro_id = $_POST['livro_id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    // Verifica se todos os campos estão preenchidos
    if (!empty($livro_id) && !empty($titulo) && !empty($autor) && !empty($ano)) {
        // Verifica se a foto foi enviada sem erros
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto_nome = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];
            $destino = './img/' . $foto_nome; // Substitua pelo caminho correto

            // Move o arquivo para o destino desejado
            if (move_uploaded_file($foto_tmp, $destino)) {
                // Atualiza no banco de dados
                $sql = "UPDATE acervo SET titulo = ?, foto = ?, autor = ?, ano = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $titulo, $foto_nome, $autor, $ano, $livro_id);

                if ($stmt->execute()) {
                    echo "Livro atualizado com sucesso!";
                    // Redireciona para a página de listagem de livros ou outra página desejada
                    header("Location: listar_livros.php");
                    exit();
                } else {
                    echo "Erro ao atualizar o livro: " . $stmt->error;
                }
            } else {
                echo "Erro ao mover o arquivo para o destino.";
            }
        } else {
            echo "Selecione uma foto!";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

$conn->close();
?>

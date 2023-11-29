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
    
    <div class="topnav">
        <a href="index.php">Inicio</a>
        <a href="cadastro_livro.php">Cadastrar Livros</a>
        <a href="cadastraEditora.html">Cadastrar Editora</a>
        <a class="active" href="editar_livro.php">Editar Livro</a>
        <a href="listar_livros.php">Excluir Livro</a>
      </div>
      <div class="conteudo">
        <h1>Editar Livros 📚</h1>
      </div>
        <div class="conteudo">
            <?php
            require_once('conectaBanco.php');

            // Consulta para obter todos os livros do acervo com suas informações
            $sql = "SELECT acervo.id, acervo.titulo, acervo.foto, acervo.autor, acervo.editora_id, acervo.ano, acervo.preco, editora.nome AS nome_editora
                    FROM acervo
                    INNER JOIN editora ON acervo.editora_id = editora.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($livro = $result->fetch_assoc()) {
                    // Cria um link para editar cada livro com base no seu ID
                    echo '<div class="card">';
                    echo '<img src="./img/' . $livro['foto'] . '" alt="' . $livro['titulo'] . '">';
                    echo '<div class= "mod">';
                    echo '<h2>' . $livro['titulo'] . '</h2>';
                    echo '<p>Autor(es): ' . $livro['autor'] . '</p>';
                    echo '<p>Editora: ' . $livro['nome_editora'] . '</p>';
                    echo '<p>Ano de Publicação: ' . $livro['ano'] . '</p>';
                    echo '<p>Preço: R$ ' . $livro['preco'] . '</p>';
                    echo '<div class="container-btn">';
                    echo '<a href="editar.php?id=' . $livro['id'] . '"><button class="btn-excluir">Editar Livro</button></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhum livro encontrado.</p>';
            }
            $conn->close();
            ?>
        </div>
</body>
</html>

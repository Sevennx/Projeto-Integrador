<!-- listar_livros.php -> excluir -->
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
        <a href="editar_livro.php">Editar Livro</a>
        <a class="active" href="listar_livros.php">Excluir Livro</a>
    </div>
    <div class="conteudo">
        <h1>Excluir de Livros 🗑❌ </h1>
    </div>
        <div class="conteudo">
            <?php
                require_once('conectaBanco.php');

        // Consulta para obter os livros do acervo com suas editoras
        $sql = "SELECT acervo.id, acervo.titulo, acervo.foto, acervo.autor, acervo.ano, editora.nome AS nome_editora, acervo.preco 
                FROM acervo 
                INNER JOIN editora ON acervo.editora_id = editora.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="./img/' . $row['foto'] . '" alt="' . $row['titulo'] . '">';
                echo '<div class= "mod">';
                echo '<h2>' . $row['titulo'] . '</h2>';
                echo '<p>Autor(es): ' . $row['autor'] . '</p>';
                echo '<p>Editora: ' . $row['nome_editora'] . '</p>';
                echo '<p>Ano de Publicação: ' . $row['ano'] . '</p>';
                echo '<p>Preço: R$ ' . $row['preco'] . '</p>';
                echo '<div class="container-btn">';
                echo '<a href="excluir_livro.php?id=' . $row['id'] . '"><button class="btn-excluir">Excluir Livro</button></a>';
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

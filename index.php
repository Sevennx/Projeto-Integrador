<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto-Book</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
</head>
<body>
    <!--Nav-Bar-->
    <div class="topnav">
        <a class="active" href="index.php">Inicio</a>
        <a href="cadastro_livro.php">Cadastrar Livros</a>
        <a href="cadastraEditora.html">Cadastrar Editora</a>
        <a href="editar_livro.php">Editar Livro</a>
        <a href="listar_livros.php">Excluir Livro</a>
        <div class="search-container">
        <form action="pesquisa_livro.php" method="post">
    <input type="text" placeholder="Pesquisar livros" name="pesquisa">
    <button type="submit">Pesquisar</button>
</form>

        </div>
    </div>  
            <div class="header">
                <h1>Lista de Livros 📔📕📗📘📙📒📓</h2>
            </div>
    <!--Conteudo Principal-->
    <div class="conteudo">
        <!--Livros-->
            <?php
                require_once('conectaBanco.php');

    // Consulta para obter os livros cadastrados
    $sql = "SELECT a.titulo, a.foto, a.autor, e.nome as editora, a.ano, a.preco FROM acervo a JOIN editora e ON a.editora_id = e.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibe os resultados dentro de cards HTML
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="./img/' . $row['foto'] . '" alt="' . $row['titulo'] . '">';
            echo '<div class="container">';
            echo '<h4><b>' . $row['titulo'] . '</b></h4>';
            echo '<h4><b>' . $row['autor'] . '</b></h4>';
            echo '<h4><b>' . $row['editora'] . '</b></h4>';
            echo '<h4><b>' . $row['ano'] . '</b></h4>';
            echo '<h4><b>$' . $row['preco'] . '</b></h4>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'Nenhum livro encontrado.';
    }

    $conn->close();
    ?>
        </div>
    </div>
    
</body>
</html>
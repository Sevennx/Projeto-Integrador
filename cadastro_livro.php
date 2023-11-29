<!--PAGINA PHP COM HTML DE VERIFICAR O CADASTRO DAS EDITORAS-->
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
        <a href="index.php">Inicio</a>
        <a class="active" href="cadastro_livro.php">Cadastrar Livros</a>
        <a href="cadastraEditora.html">Cadastrar Editora</a>
        <a href="editar_livro.php">Editar Livro</a>
        <a href="listar_livros.php">Excluir Livro</a>
      </div>
      <div class="conteudo">
      <h1>New Book Livraria 📕</h2>
      </div>
    <!--Formulario de Cadastro -->
    <div class="FormularioCadastro">
        <h2>Formulario de Cadastro de Livros 📖</h2>
        <form action="cadastra_livro.php" method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo"><br><br>
            <label for="autor">Adicionar Capa:</label>
            <input class="btn-foto" type="file" id="foto" name="foto"><br><br>
            <label for="autor">Autor(es):</label>
            <input type="text" id="autor" name="autor"><br><br>
            <label for="editora">Editora:</label>
            <select name="editora" id="editora">
                <?php
                require_once('conectaBanco.php');
                // Consulta para obter as editoras cadastradas
                $sql = "SELECT id, nome FROM editora";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                } else {
                    echo '<option value="">Nenhuma editora encontrada</option>';
                }
                $conn->close();
                ?>
            </select><br><br>
            <label for="ano_publicacao">Ano Publicação:</label>
            <input type="text" id="ano" name="ano"><br><br>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
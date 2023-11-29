<?php
require_once('conectaBanco.php');

if (isset($_GET['id'])) {
    $livro_id = $_GET['id'];

    $sql = "SELECT * FROM acervo WHERE id = $livro_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $livro = $result->fetch_assoc();
    } else {
        echo "Livro não encontrado.";
        exit();
    }

    $conn->close();
} else {
    echo "ID do livro não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    <title>Editar Livro</title>
    <!-- Seus estilos CSS -->
</head>
<body>
        <div class="topnav">
            <a class="active" href="index.php">Inicio</a>
            <a href="cadastro_livro.php">Cadastrar Livros</a>
            <a href="cadastraEditora.html">Cadastrar Editora</a>
            <a href="editar_livro.php">Editar Livro</a>
            <a href="listar_livros.php">Excluir Livro</a>
        </div>
    <div class="formularioCadrastro">
    <h1>Editar Livro</h1>
    <form action="atualiza_livros.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="livro_id" value="<?php echo $livro['id']; ?>">
    
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>"><br><br>
        
        <label for="foto">Adicionar Capa:</label>
        <input class="btn-foto" type="file" id="foto" name="foto" value="<?php echo $livro['foto']; ?>"><br><br>

        <label for="autor">Autor(es):</label>
        <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>"><br><br>

        <label for="ano">Ano de Publicação:</label>
        <input type="text" id="ano" name="ano" value="<?php echo $livro['ano']; ?>"><br><br>
        <!-- Adicione outros campos que você deseja editar -->

        <input class="btn-excluir" type="submit" value="Salvar Alterações">
    </form>
    </div>
</body>
</html>

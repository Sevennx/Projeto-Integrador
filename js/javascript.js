  document.addEventListener('DOMContentLoaded', function () {
    // Encontrando o formulário e o botão de cadastro
    const form = document.querySelector('form');
    const cadastrarBtn = document.querySelector('input[type="submit"]');

    // Adicionando um evento de clique ao botão de cadastro
    cadastrarBtn.addEventListener('click', function (event) {
      // Encontrando os campos do formulário
      const titulo = document.getElementById('titulo').value;
      const autor = document.getElementById('autor').value;
      const editora = document.getElementById('editora').value;
      const ano = document.getElementById('ano').value;
      const preco = document.getElementById('preco').value;

      // Verificando se algum campo está vazio
      if (titulo === '' || autor === '' || editora === '' || ano === '' || preco === '') {
        // Exibindo mensagem de alerta se algum campo estiver vazio
        event.preventDefault(); // Impede o envio do formulário
        alert('Por favor, preencha todos os campos!');
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    // Encontrando o campo de input de pesquisa e o botão de submit
    const inputProcurar = document.querySelector('.search-container input[type="text"]');
    const botaoPesquisar = document.querySelector('.search-container button[type="submit"]');

    // Adicionando um evento de clique ao botão de pesquisar
    botaoPesquisar.addEventListener('click', function (event) {
      // Verificando se o campo de input está vazio
      if (inputProcurar.value.trim() === '') {
        event.preventDefault(); // Impede o envio do formulário
        alert('Por favor, insira algo para pesquisar!');
      }
    });
  });



const apiUrl = 'https://jsonplaceholder.typicode.com/posts';

    // Fazendo uma requisição GET com Fetch
    fetch(apiUrl)
      .then(response => {
        // Verificando se a resposta foi bem-sucedida
        if (!response.ok) {
          throw new Error('Erro ao obter os posts');
        }
        return response.json();  // Convertendo a resposta para JSON
      })
      .then(data => {
        // Pegando o elemento <ul> onde os títulos dos posts serão inseridos
        const ul = document.getElementById('post-titles');

        // Iterando sobre os posts e exibindo os títulos
        data.forEach(post => {
          // Criando um novo item de lista (<li>) para cada título de post
          const li = document.createElement('li');
          li.textContent = post.title;
          ul.appendChild(li);
        });
      })
      .catch(error => {
        console.error('Erro:', error);
      });
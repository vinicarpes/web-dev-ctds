 const baseUrl = 'https://viacep.com.br/ws/';

 function handleBuscar() {
    const cep = document.getElementById('cep').value.replace(/\D/g, '');
  
    if (!cep.match(/^\d{8}$/)) {
      alert('Por favor, digite um CEP válido com 8 dígitos.');
      return;
    }
  
    const apiUrl = `${baseUrl}${cep}/json/`;
    
      axios.get(apiUrl)
      .then(response => {
        const data = response.data;
        const ul = document.getElementById('endereco-info');
        ul.innerHTML = ''; 
  
        if (data.erro) {
          ul.innerHTML = '<li>CEP não encontrado.</li>';
          return;
        }
  
        const campos = {
          CEP: data.cep,
          Logradouro: data.logradouro,
          Complemento: data.complemento,
          Bairro: data.bairro,
          Localidade: data.localidade,
          UF: data.uf,
          IBGE: data.ibge
        };
  
        for (let [label, valor] of Object.entries(campos)) {
          const li = document.createElement('li');
          li.textContent = `${label}: ${valor || '-'}`;
          ul.appendChild(li);
        }
      })
      .catch(error => {
        console.error('Erro ao buscar CEP:', error);
        alert('Ocorreu um erro ao consultar o CEP. Tente novamente mais tarde.');
      });
  }
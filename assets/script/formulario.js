
    function mostrarModal() {
      
      const nome = document.getElementById('nomear').value;
      const dataNascimento = document.getElementById('data-nascimento').value;
      const genero = document.getElementById('genero').value;
      const telefone = document.getElementById('telefone').value;
      const motivo = document.getElementById('motivo').value;
    
      const dadosModal = `Nome: ${nome}\nData de Nascimento: ${dataNascimento}\nGênero: ${genero}\nTelefone: ${telefone}\nMotivo: ${motivo}`;
      document.getElementById('dados-modal').innerText = dadosModal;
      
      document.getElementById('modal').classList.remove('hidden');
    }
    function fecharModal() {
    
      document.getElementById('modal').classList.add('hidden');
    }
    function enviarFormulario() {
      
      alert('Formulário enviado com sucesso!');
     
      
      fecharModal();
     
    
      document.getElementById('formulario').submit();
    }
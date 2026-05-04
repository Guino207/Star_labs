<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/medico.css">
    <title>painel de ADM</title>
</head>
<body>



    
  <div class="container">

    <div class="sidebar active">
      <div class="logo">Falta do logotipo</div>
      <ul>
        <li class="active" data-section="home">Painel do ADM</li>
        <li data-section="pacientes">Pacientes</li>
        <li data-section="agendamentos">Agendamentos</li>
        <li data-section="relatorios">Relatorios</li>
        <li data-section="medicos">Médicos</li>
      </ul>
    </div>

    
    <div class="main-content">

    
      <div class="header">
        <div class="welcome" id="welcome-text">Bem-vindo,Administrador!</div>
        <div style="color: #666;"></div>
      </div>

    
      <div class="content">

        
        <div id="home" class="section active">

          
      <div class="titulo-sessao">
        
    


</div>
<div class="azul">
<img src="./img/selfcare.png" alt="care">
<div class="letras-azul">
<h3>parte medica</h3>
<p>voce tem 0 consultas marcadas pra hoje</p>
</div>

</div>




<div class=" spacecards">

    <div class="cardform">
        <div class="topocard">
            <h4>Pacientes Cadastrados</h4>
            <img src="./img/user.png" class="icones">
        </div>
        <h1>0</h1>
        <p>Total no sistema</p>
        <small class="verde">analises e estatisticas||</small>
    </div>

    <div class="cardform ">
        <div class="topocard">
            <h4>Agendamentos Hoje</h4>
            <img src="./img/calendar.png" class="icones">
        </div>
        <h1>0</h1>
    </div>



    <div class="cardform">
        <div class="topocard">
            <h4>Consultas Pendentes</h4>
            <img src="./img/time.png" class="icones">
        </div>
        <h1>0</h1>
        <p>Aguardando atendimento</p>
    </div>

</div>




  


<div class="pages" id="pages" >
</div>
   
          
            
          </div>
        </div>






        
        <div id="pacientes" class="section">
        




        <div class="container-pacientes">
        <div class="header-tabelapaciente">
          <h2>Gestao de Pacientes</h2>
          <input type="text" id="search" placeholder="Pesquisar...">
          <div>
            <button class="add-btn" onclick="openModal()">+ Adicionar</button>
            <button class="delete-all" onclick="deleteAll()">Excluir Todos</button>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>Nº</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>excluir</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>
      
      <div class="modal" id="modal">
        <div class="modal-content">
          <h3>Edite</h3>
          
          <span    id="close" onclick="fecharModalAdicionar()" style="cursor:pointer; font-size:24px;">×</span>
          <form id="form">
            <input type="text" id="nome" placeholder="Nome" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="phone" placeholder="Telefone" required>
            <button type="submit">Salvar</button>

          </form>
        </div>






        </div>
        </div>




        <div id="agendamentos" class="section">
          <h2>Agendamentos</h2>
          <div class="placeholder">Gerenciamento de agendamentos virao aqui...</div>
        </div>





        <div id="relatorios" class="section">
          
            
  
    <div class=" container-pacientes ">
  <div class="top">
      <div class="temadopaciente">
          <h3>Relatorios</h3>
          <p>Analises e metricas operacionais</p>
      </div>
      <button class="btn" onclick="atualizar()">Atualizar</button>
  </div>
  
  <div class="filtros">
      <select id="tipo">
          <option>Visão Geral</option>
      </select>
      <input type="date" id="inicio">
      <input type="date" id="fim">
      
  </div>
  <!-- cardsde atualizar-->
  <div class="cards">
      <div class="card">
          <h3>Total Atendimentos</h3>
          <p id="total">0</p>
      </div>
      <div class="card">
          <h3>Pacientes</h3>
          <p id="pacientes">0</p>
      </div>
      <div class="card">
          <h3>Profissionais</h3>
          <p id="profissionais">0</p>
      </div>
      <div class="card">
          <h3>Media Diaria</h3>
          <p id="media">0</p>
      </div>
  </div>
  <!-- grafico -->
  <div class="graficos">
      <div class="grafico">
          <h3>Atendimentos por Dia</h3>
          <canvas id="graficoDia"></canvas>
      </div>
      <div class="grafico">
          <h3>Atendimentos por Setor</h3>
          <canvas id="graficoSetor"></canvas>
      </div>
  </div>
  </div>
        </div>





        <div id="medicos" class="section">

          <div class="container-pacientes">
          <div class="topo-medico">
            
            <h2>Gestao de Medicos</h2>
            <button class="btn-add" onclick="abrirModalAdicionar()">
                Novo Medico
            </button>
        </div>

            <div class="container-pramedicos">
                <table id="tabelaMedicos">
                    <thead class="itemtabela">
                        <tr>
                            <th>Nome</th>
                            <th>Especialidade</th>
                            <th>Contato</th>
                            <th>Agenda</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody id="corpoTabela">
                        
                    </tbody>
                </table>
            </div>
          </div>
            
    
    <div id="modalAdicionar" class="modalmedicos">
        <div class="modalmedicos-content">
            <div class="modalmedicos-header">
                <h2>Cadastrar Novo DR!</h2>
                
            </div>
            <div class="modalmedicos-body">
                <form id="formMedico" onsubmit="cadastrarMedico(event)" method="post">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" id="nome" required name="name">
                    </div>
                   
                    <div class="form-group">
                        <label>Especialidade</label>
                        <select id="especialidade" name="especialidade">
                            <option value="">Selecione</option>
                            <option value="Cardiologia">Cardiologia</option>
                            <option value="Pediatria">Pediatria</option>
                            <option value="Ortopedia">Ortopedia</option>
                            <option value="Neurologia">Neurologia</option>
                            <option value="Ginecologia">Ginecologia</option>
                            <option value="Dermatologia">Dermatologia</option>
                            <option value="Clínica Geral">Clínica Geral</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" id="email" required name="email">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="tel" id="telefone" required name="telefone">
                    </div>
                </form>
            </div>
            <div class="modalmedicos-footer">
                <button class="btn btn-cancel" onclick="fecharModalAdicionar()">Cancelar</button>
                <button class="btn btn-save" onclick="cadastrarMedico()" name="Salvar">Salvar Médico</button>
            </div>
        </div>
    </div>

    
    <div id="modalAgenda" class="modalmedicos">
        <div class="modalmedicos-content">
            <div class="modalmedicos-header">
                <div>
                    <h2 id="nomeAgenda"></h2>
                    <p id="especialidadeAgenda" style="margin-top:5px; opacity:0.9;"></p>
                </div>
                <span onclick="fecharModalAgenda()" style="cursor:pointer; font-size:28px;">×</span>
            </div>
            <div class="modalmedicos-body">
                <h3>Calendário - Abril 2026</h3>
                <div class="calendar" id="calendario">
                    
                </div>

                <h3 style="margin-top:25px;">Consultas Marcadas</h3>
                <div id="listaConsultas" style="margin-top:10px;">
                    
                </div>
            </div>
        </div>
    </div>
    
        </div>


        </div>

      </div>
    </div>
  </div>


 

    <script src="./assets/script/medico.js"></script>
</body>
</html>

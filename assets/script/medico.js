
    
    document.querySelectorAll('.sidebar ul li').forEach(item => {
        item.addEventListener('click', () => {
          
          document.querySelectorAll('.sidebar ul li').forEach(li => li.classList.remove('active'));
          item.classList.add('active');
  
          
          document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
          });
  
          
          const sectionId = item.getAttribute('data-section');
          document.getElementById(sectionId).classList.add('active');
        });
      });




      /*pacientes*/

      
let users = [];
let editIndex = null;
const tableBody = document.getElementById("tableBody");
const modal = document.getElementById("modal");
const form = document.getElementById("form");
const search = document.getElementById("search");
const fechar = document.getElementById("close");

function fecharmodal(){
 
  
fechar.onclick =() =>{
  modal.style.display = "none";
};
}
fechar.addEventListener("click",fecharmodal );



function openModal(edit=false,index=null){
  modal.classList.add("active");
  if(edit){
    editIndex = index;
    let u = users[index];
    nome.value = u.name;
    email.value = u.email;
    phone.value = u.phone;
  }else{
    form.reset();
    editIndex = null;
  }
};


form.addEventListener("submit",function(e){
  e.preventDefault();
  let user = {
    name: nome.value,
    email: email.value,
    phone: phone.value
  };
  if(editIndex !== null){
    users[editIndex] = user;
  }else{
    users.push(user);
  }
 

  render();
});

function render(data = users){
  tableBody.innerHTML = "";
  data.forEach((u,i)=>{
    tableBody.innerHTML += `
      <tr>
        <td>${i+1}</td>
        <td>${u.name}</td>
        <td>${u.email}</td>
        <td>${u.phone}</td>
        <td>
          <button class="edit" onclick="openModal(true,${i})">Editar</button>
          <button class="delete" onclick="removeUser(${i})">Excluir</button>
        </td>
      </tr>
    `;
  });
}

   
/* excluir o medico*/
function removeUser(i){
  if(confirm("Deseja excluir?")){
    users.splice(i,1);
    render();
  }
}
/* apagar tudo*/
function deleteAll(){
  if(confirm("Excluir todos?")){
    users = [];
    render();
  }
}
/*filtro de busca*/
search.addEventListener("keyup",function(){
  let v = this.value.toLowerCase();
  let filtered = users.filter(u =>
    u.name.toLowerCase().includes(v) ||
    u.email.toLowerCase().includes(v)
  );
  render(filtered);
});
/* simulei o usuario*/
users = [
];
render();








/*aqui coloquei js dos mwedicos ,coloca algumas funcionalidadas aqui*/








let medicos = [
  {
      id: 1,
      nome: "Dr. Joao Mendes",
      especialidade: "Cardiologia",
      email: "joao.mendes@email.com",
      telefone: "947931509",
      consultas: [
          { data: "2026-04-03", hora: "09:00", paciente: "Maria Oliveira" },
          { data: "2026-04-10", hora: "14:30", paciente: "Carlos Silva" }
      ]
  },
  {
      id: 2,
      nome: "Dr.Pedro alvares Cabral",
      especialidade: "Pediatria",
      email: "Pedro.cabral@email.com",
      telefone: "951880969",
      consultas: [
          { data: "2026-04-05", hora: "10:00", paciente: "Lucas Ferreira" }
      ]
  }
];

      let medicoAtual = null;

      
      function renderizarTabela() {
          const tbody = document.getElementById("corpoTabela");
          tbody.innerHTML = "";

          medicos.forEach(medico => {
              const tr = document.createElement("tr");
              tr.innerHTML = `
                  <td><strong>${medico.nome}</strong></td>
                  <td><span class="especialidade">${medico.especialidade}</span></td>
                  <td>
                      ${medico.email}<br>
                      <small>${medico.telefone}</small>
                  </td>
                  <td>
                      <button class="btn-agenda" onclick="abrirAgenda(${medico.id})">Ver Agenda</button>
                  </td>
                  <td>
                      <button onclick="excluirMedico(${medico.id})" style="background:none; border:none; color:#dc3545; font-size:18px; cursor:pointer;">excluir</button>
                  </td>
              `;
              tbody.appendChild(tr);
          });
      }

      
      function abrirModalAdicionar() {
          document.getElementById("modalAdicionar").style.display = "flex";
          document.getElementById("formMedico").reset();
      }

      function fecharModalAdicionar() {
          document.getElementById("modalAdicionar").style.display = "none";
      }

      
      function cadastrarMedico() {
          const nome = document.getElementById("nome").value.trim();
          const especialidade = document.getElementById("especialidade").value;
          const email = document.getElementById("email").value.trim();
          const telefone = document.getElementById("telefone").value.trim();

          if (!nome || !especialidade || !email || !telefone) {
              alert("Por favor, preencha todos os campos!");
              return;
          }

          const novoMedico = {
              id: Date.now(),
              nome,
              especialidade,
              email,
              telefone,
              consultas: []
          };

          medicos.push(novoMedico);
          renderizarTabela();
          fecharModalAdicionar();
          alert("DR cadastrado com sucesso!");
      }

      
      function abrirAgenda(id) {
          medicoAtual = medicos.find(m => m.id === id);
          if (!medicoAtual) return;

          document.getElementById("nomeAgenda").textContent = medicoAtual.nome;
          document.getElementById("especialidadeAgenda").textContent = medicoAtual.especialidade;

          document.getElementById("modalAgenda").style.display = "flex";
          gerarCalendario();
          mostrarConsultas();
      }

      function fecharModalAgenda() {
          document.getElementById("modalAgenda").style.display = "none";
      }

      
      function gerarCalendario() {
          const calendario = document.getElementById("calendario");
          calendario.innerHTML = "";

          const diasSemana = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];
          
          
          diasSemana.forEach(dia => {
              const div = document.createElement("div");
              div.className = "calendar-header";
              div.textContent = dia;
              calendario.appendChild(div);
          });

          
          for (let i = 1; i <= 30; i++) {
              const dataStr = `2026-04-${i.toString().padStart(2, '0')}`;
              const temConsulta = medicoAtual.consultas.some(c => c.data === dataStr);

              const dayDiv = document.createElement("div");
              dayDiv.className = `calendar-day ${temConsulta ? 'has-appointment' : ''}`;
              dayDiv.innerHTML = `<div class="day-number">${i}</div>`;
              
              dayDiv.onclick = () => {
                  const consultasDia = medicoAtual.consultas.filter(c => c.data === dataStr);
                  if (consultasDia.length > 0) {
                      alert(`Consultas em 04/${i}/2026:\n\n` + 
                            consultasDia.map(c => `${c.hora} - ${c.paciente}`).join("\n"));
                  }
              };

              calendario.appendChild(dayDiv);
          }
      }

      
      function mostrarConsultas() {
          const container = document.getElementById("listaConsultas");
          container.innerHTML = "";

          if (medicoAtual.consultas.length === 0) {
              container.innerHTML = "<p style='color:#666; font-style:italic;'>Nenhuma consulta marcada ainda.</p>";
              return;
          }

          medicoAtual.consultas.forEach(consulta => {
              const div = document.createElement("div");
              div.style.cssText = "background:#f8f9fa; padding:12px; margin:8px 0; border-radius:8px; border-left:4px solid #007bff;";
              div.innerHTML = `
                  <strong>${consulta.data}</strong> às <strong>${consulta.hora}</strong><br>
                  Paciente: ${consulta.paciente}
              `;
              container.appendChild(div);
          });
      }

      
      function excluirMedico(id) {
          if (confirm("Tem certeza que deseja excluir este DR?")) {
              medicos = medicos.filter(m => m.id !== id);
              renderizarTabela();
          }
      }

      
      window.onload = function() {
          renderizarTabela();
      };
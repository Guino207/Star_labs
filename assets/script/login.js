const container= document.getElementById
('container');

const botaocadastro = document.
getElementById('cadastro');
 const botaologin= document.getElementById
 ('login');

 botaocadastro.addEventListener('click',()=>{

    container.classList.add("active");
 }
 );

 botaologin.addEventListener('click',()=>{

container.classList.remove("active")
 }
 )
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexion.php';


if(isset($_POST['cadastrar'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = $_POST['password'];
    


    $has = password_hash($password, PASSWORD_DEFAULT);

    if(empty($name) or empty($email) or empty($senha) or empty($password)){
        $mensagem = "Precisa preencher todos os campos!";
    }else{

    if($senha != $password){
        $error = "Senha precisa ser igual";
    }else{
        $sql = "INSERT INTO func(name,email,password) VALUES(?,?,?)";

        $stmt = $c->prepare($sql);

        $stmt->bind_param("sss", $name, $email, $has);

        if($stmt->execute()){
            header("Location: medico.php");
        }else{
            $mensagem = $c->error;
        }
        $stmt->close();
    }

}
}




if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT id, name, email, password, escolha FROM func WHERE email = ?";

    $stmt = $c->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $usuario = $result->fetch_assoc();

        if(password_verify($senha, $usuario['password'])){
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header("Location: medico.php");
            exit();
        }
        else{
            $error = "Senha incorreta";
        }
    }else{
        $error = "Usuario inexistente";
    }
    $stmt->close();
    $c->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>login/Cadastro</title>
</head>
<body>
     <div class="container" id="container">
        <div class="insira-container user-face">
        <form action="" method="post">
            <h1>Cadastro</h1>
           
         <input type="text" placeholder="Digite o nome..." name="name" required>
            <input type="email" placeholder="Digite o e-mail" name="email" required>
            <input type="password" placeholder="Digite a senha" name="senha" required>
            <input type="password" name="password" placeholder="Confirme a senha" required>

  
            
            <button class="cadastrado" type="submit" name="cadastrar">Cadastrar</button>
        </form></div>

        <div class="insira-container login-face">
            <form action="" method="post">
                <h1>Login</h1>

                
                <input type="email" placeholder="Digite o e-mail" name="email" required>
                <input type="password" placeholder="Digite a senha" name="password" required>
                <button login-conta name="login">Enviar</button>
                <a href="#">esqueceu a senha?</a> 
            </form></div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-painel  toggle-left">
                    <h1>Bem-Vindo de volta!</h1>
                    <button class="hidden" id="login">login</button>
                </div>
                <div class="toggle-painel
                toggle-right">
                <h1>Ola,ADM!</h1>
                <button class="hidden" id="cadastro">cadastrar</button>
            </div>
                </div>
            </div>
            
     </div>
    
    

    <script src="./assets/script/login.js"></script>
</body>
</html>
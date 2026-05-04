<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexion.php';  


if (isset($_POST['cadastrar'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['password'];
    
    if (empty($name) || empty($email) || empty($senha) || empty($confirmar_senha)) {
        $mensagem = "Precisa preencher todos os campos!";
    } elseif ($senha != $confirmar_senha) {
        $error = "Senhas não coincidem!";
    } else {
        $has = password_hash($senha, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO func (name, email, password) VALUES (?, ?, ?)";
        $stmt = $c->prepare($sql); 
        $stmt->bind_param("sss", $name, $email, $has);
        
        if ($stmt->execute()) {
            header("Location: medico.php");
            exit();
        } else {
            $mensagem = "Erro: " . $c->error;
        }
        $stmt->close();
    }
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    
    $sql = "SELECT id, name, email, password FROM func WHERE email = ?";
    $stmt = $c->prepare($sql);  
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        
        if (password_verify($senha, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['name'];      
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_escolha'] = $usuario['escolha'] ?? '';
            
            header("Location: medico.php");
            exit();
        } else {
            $error = "Senha incorreta!";
        }
    } else {
        $error = "Usuário não encontrado!";
    }
    $stmt->close();
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
    <title>Login / Cadastro</title>
</head>
<body>
    <div class="container" id="container">
        
        
        <div class="insira-container user-face">
            <form action="" method="post">
                <h1>Cadastro</h1>
                <?php if(isset($mensagem)): ?>
                    <p style="color: red; text-align: center;"><?php echo $mensagem; ?></p>
                <?php endif; ?>
                <?php if(isset($error) && isset($_POST['cadastrar'])): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <input type="text" placeholder="Digite o nome..." name="name" required>
                <input type="email" placeholder="Digite o e-mail" name="email" required>
                <input type="password" placeholder="Digite a senha" name="senha" required>
                <input type="password" name="password" placeholder="Confirme a senha" required>
                

                
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
        </div>

        
        <div class="insira-container login-face">
            <form action="" method="post">
                <h1>Login</h1>
                <?php if(isset($error) && isset($_POST['login'])): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <input type="email" placeholder="Digite o e-mail" name="email" required>
                <input type="password" placeholder="Digite a senha" name="password" required>
                

                
                <button type="submit" name="login">Enviar</button>
                <a href="#">Esqueceu a senha?</a>
            </form>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-painel toggle-left">
                    <h1>Bem-Vindo de volta!</h1>
                    <button class="hidden" id="login">login</button>
                </div>
                <div class="toggle-painel toggle-right">
                    <h1>Olá, ADM!</h1>
                    <button class="hidden" id="cadastro">cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/script/login.js"></script>
</body>
</html>
<?php
include 'Contato.class.php';
 
$contato = new Contato();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
 
        if ($contato->usuarioExiste($email)) {
            echo "<script>alert('Usuário já está cadastrado.');</script>";
        } else {
            if ($contato->insertUser($nome, $email, $senha)) {
                echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar o usuário.');</script>";
            }
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0ff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
 
        .container {
            background-color: #e6e6fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin: 20px;
        }
 
        h2 {
            text-align: center;
            color: #4b0082;
        }
 
        label {
            color: #4b0082;
            font-weight: bold;
        }
 
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
 
        input[type="submit"] {
            width: 100%;
            background-color: #9370db;
            color: white;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
 
        input[type="submit"]:hover {
            background-color: #7a42f4;
        }
 
        .link-login {
            text-align: center;
            margin-top: 10px;
        }
 
        .link-login a {
            color: #4b0082;
            text-decoration: none;
        }
 
        .link-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 
    <div class="container">
        <h2>Cadastrar</h2>
        <form action="" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>
 
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
 
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br><br>
 
            <input type="hidden" name="acao" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
 
        <div class="link-login">
            <p>Já tem uma conta? <a href="index.php">Entrar</a></p>
        </div>
    </div>
 
</body>
</html>
 
<?php
include 'Contato.class.php';
 
$contato = new Contato();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['acao']) && $_POST['acao'] == 'login') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
 
        if ($contato->checarLogin($email, $senha)) {
            echo "<script>alert('Login bem-sucedido!');</script>";
        } else {
            echo "<script>alert('Email ou senha incorretos.');</script>";
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css"/>
    <title>Login de Usuário</title>
</head>
<body>
 
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
 
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br><br>
 
            <input type="hidden" name="acao" value="login">
            <input type="submit" value="Entrar">
        </form>
 
        <div class="link-cadastro">
            <p>Não tem uma conta? <a href="cadastro.php">Criar Conta</a></p>
        </div>
    </div>
 
</body>
</html>
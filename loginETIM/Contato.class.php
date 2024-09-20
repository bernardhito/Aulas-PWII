<?php
 
/**
 * @author Pahblo Henrique & Paulo Eduardo
 * data agosto/2024
 * classe com conexao a banco de dados
 * @return boolean
 */
 
class Contato {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;
    private $idade;
    private $cel;
 
    function getId() {
        return $this->id;
    }
 
    function getNome() {
        return $this->nome;
    }
 
    function getEmail() {
        return $this->email;
    }
 
    function getSenha() {
        return $this->senha;
    }
 
    function getPdo() {
        return $this->pdo;
    }
 
    function setNome($nome) {
        $this->nome = $nome;
    }
 
    function setEmail($email) {
        $this->email = $email;
    }
 
    function setSenha($senha) {
        $this->senha = $senha;
    }
 
    function __construct() {
        // Conexão ao banco de dados (verifique se os dados estão corretos)
        $dsn = "mysql:dbname=etimcontato;host=localhost";
        $dbUser = "root";
        $dbpass = "";
 
        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbpass);
        } catch (Throwable $th) {
            echo "Erro ao conectar ao banco de dados: " . $th->getMessage();
        }
    }
 
    // Método para inserir um novo usuário na tabela `usuarios`
    function insertUser($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);
        return $sql->execute();
    }
 
    // Método para inserir uma nova atividade na tabela `atividade`
    function insertAtividade($nome, $idade, $cel) {
        $sql = "INSERT INTO atividade SET nome = :nome, idade = :idade, cel = :cel";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":idade", $idade);
        $sql->bindValue(":cel", $cel);
        return $sql->execute();
    }
 
    // Método para verificar se o usuário já está cadastrado (verifica se o email existe)
    function usuarioExiste($email) {
        $sql = "SELECT COUNT(*) as total FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] > 0; // Retorna true se o email já estiver cadastrado
    }
 
    // Método para verificar se o email e a senha correspondem a um registro no banco de dados
    function checarLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
 
        if ($sql->rowCount() > 0) {
            return true; // Usuário e senha encontrados
        } else {
            return false; // Não encontrado
        }
    }
}
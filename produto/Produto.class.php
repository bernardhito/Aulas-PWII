    <?php
    class Produto{
        private $id;
        private $descricao;
        private $preco;
        private $fronecedor;
        private $pbo;   

        public function getId(){
            return $this->id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function getFornecedor(){
            return $this->fronecedor;
        }

        public function setDescricao($desc){
            $this-> descricao = $desc;
        }

        public function setPreco($preco){
            $this -> preco = $preco;
        }

        public function setFornecedor($fornecedor){
            return $this -> $fornecedor = $fornecedor;
        }

        /**
         * @author : Bernardo Freitas de Lima
         * Metodo para conectar ao banco
         * Retorna Verdadeiro se conectar ou Flaso se nao conseguir
         */
        public function conectar (){
                try {
                //  O  PDO eh uma classe de conexao com o bando de dados
                // ela precisa desses tres parametros
                $dsn    = "mysql:dbname=etimproduto;host=localhost";
                $dbUser = "root";
                $dbPass ="";

            $this ->pdo = new PDO($dsn, $dbUser, $dbPass);
            echo "<h2>Conectado ao banco com sucesso!</h2>";
            return true;

        } catch (\Throwable $th) {
            echo "<h2>Sem conexao. Tente mais tarde!</h2>";
            return false;
        }
    }
}
    
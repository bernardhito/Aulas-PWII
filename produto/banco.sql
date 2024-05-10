CREATE DATABASE etimproduto;
USE etimproduto;
CREATE TABLE produtos(
    id int AUTO_INCREMENT PRIMARY key,
    preco double(10,2),
    fornecedor varchar(100),
    descricao varchar(100)
    )
<?php
require 'Produto.class.php';
$p=new Produto();
$p -> setDescricao('computador Lenovo');
$dados = $p -> getDescricao();
$p->conectar();

echo '<h2>O conteúdo do atributo descrição é: '.$dados;

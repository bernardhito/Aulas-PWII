<?php  
include 'Contato.class.php';
 
$contato = new Contato();
 
// Inserindo registro na tabela usuarios
$resultadoUser = $contato->insertUser("Pahblo", "phmsenas@gmail.com", "Pahblo100@@");
 
if ($resultadoUser) {
    echo "
    <script>
    alert('Registro de usuário inserido com sucesso!')
    </script>";
} else {
    echo "
    <script>
    alert('Erro ao inserir registro de usuário!')
    </script>";
}
 
// Inserindo registro na tabela atividade
$resultadoAtividade = $contato->insertAtividade("Menezes", "16", "11971954409");
 
if ($resultadoAtividade) {
    echo "
    <script>
    alert('Registro de atividade inserido com sucesso!')
    </script>";
} else {
    echo "
    <script>
    alert('Erro ao inserir registro de atividade!')
    </script>";
}
 
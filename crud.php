<?php
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

if(isset($_POST["inserir"]))
{ 
    $comando = $pdo->prepare("INSERT INTO alunos(nome,idade) VALUES('$nome', $idade)");
}

if(isset($_POST["excluir"]))

{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
}

if(isset($_POST["alterar"]) )
{
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
}

if(isset($_POST["lsitar"]) )
{
    $comando = $pdo->prepare("SELECT * FROM alunos WHERE matricula=$matricula");
}

$resultados = $comando->execute();
    
header("Location: cadastro.html");
?>

<?php
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

if(isset($_POST["inserir"]))
{ 
    $comando = $pdo->prepare("INSERT INTO alunos(nome,idade) VALUES('$nome', $idade)");
    $resultado = $comando->execute();  
    header("Location: cadastro.html");
}

if(isset($_POST["excluir"]))

{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    $resultado = $comando->execute();  
    header("Location: cadastro.html");
}

if(isset($_POST["alterar"]) )
{
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();  
    header("Location: cadastro.html");
}
if(isset($_POST["listar"]))
{
    $comando = $pdo->prepare("SELECT * FROM alunos WHERE matricula=$matricula ");
    $resultados = $comando->execute();

    while($linhas = $comando->fetch())
    {
        $m = $linhas["matricula"];
        $n = $linhas["nome"];
        $i = $linhas["idade"];
//só mostra se o aluno for maior de idade
        if($i >= 18)
        {
            echo(" Nome: $n  idade: $i matricula: $m <br> <br>");
        }
        else
        {
            header("Location: cadastro.html"); 
        }
    }
} 
?>

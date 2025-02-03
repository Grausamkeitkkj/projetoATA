<?php

require_once("./class/class_aluno.php");

$aluno = new Aluno();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dados = $_POST;
    $dados['idAluno'] = $dados['presenca'];
    $diasPresenca = $dados['contagemPresenca'];
    unset($dados['contagemPresenca']);
    unset($dados['presenca']);

    if(isset($dados['idAluno'])){
        foreach($dados['idAluno'] as $id){
            $aluno->setPresencaAluno($id, $diasPresenca); 
        }
        header("location: aluno_presenca.php");
    }else{
        echo "<script>alert('Nenhum aluno selecionado.')</script>";
        header("location: aluno_presenca.php");
    }
}
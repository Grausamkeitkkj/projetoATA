<?php

require_once("funcoes_uteis.php");
require_once("class/class_aluno_experimental.php");

$aluno = new alunoExperimental();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;

    $dados["telefone"] = limpa_texto($dados["telefone"]);

    if(empty($dados["nome"]) || empty($dados["idade"]) || empty($dados["nivel"]) || empty($dados["data"]) || empty($dados["hora"]) || empty($dados["telefone"])) {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = 'experimental.php';</script>";
        die();
    }

    if(strlen($dados["idade"]) > 2){
        echo "<script>alert('Por favor, preencha o campo idade corretamente.'); window.location.href = 'experimental.php';</script>";
        die();
    }

    $dados["data"] = implode('-', array_reverse(explode('/', $dados["data"])));
    $aluno->addExperimental($dados);
    header("Location: experimental.php");
   
}
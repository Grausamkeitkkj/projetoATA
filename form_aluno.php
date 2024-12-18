<?php

require_once("./class/class_aluno.php");
require_once("./funcoes_uteis.php");

$aluno = new Aluno();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dados = $_POST;

    $dados["telefone"] = limpa_texto($dados["telefone"]);
    $dados["idade"] = date('Y-m-d', strtotime($dados["idade"]));
    $dados["cpf"] = limpa_cpf($dados["cpf"]);

    if(empty($dados["nome"]) || empty($dados["idade"]) || empty($dados["telefone"]) || empty($dados["cpf"]) || empty($dados["faixa"])){
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = 'form_aluno.php';</script>";
        die();
    }

    $aluno->addAluno($dados);
    header("Location: aluno_cadastro.php");
    exit();
}
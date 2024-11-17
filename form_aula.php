<?php

require_once("./class/class_aula.php");

$aula = new aula();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;
    #echo "<pre>";
    #print_r($dados);
    #echo "</pre>";
    #exit;

    if(empty($dados["horario"]) || empty($dados["nivel"]) || empty($dados["dia_da_semana"])) {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = 'aula.php';</script>";
        die();
    }

    if (is_array($dados["dia_da_semana"])) {
        $dados["dia_da_semana"] = array_sum($dados["dia_da_semana"]);
    }

    #echo "<pre>";
    #print_r($dados);
    #echo "</pre>";
    #exit;

    $aula->addAula($dados);
    header("Location: aula.php");
}
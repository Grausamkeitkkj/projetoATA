<?php

require_once('conexao/conexao.php');

class aula{
    
    function addAula($dados){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO aula (horario, nivel, dias_semana")
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('sss', $dados['horario'], $dados['nivel'], $dados['dias_semana']);

        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $stmt->close();
    }

    function getAula(){
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT horario, nivel, dias_semana FROM aula WHERE dias_semana > CURDATE() ORDER BY dias_semana ASC");
        if ($stmt === false) {
            die($mysqli->error);
        }

        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }
}
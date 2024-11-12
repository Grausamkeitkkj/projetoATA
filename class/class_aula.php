<?php

require_once('conexao/conexao.php');

class aula{
    
    function addAula($dados){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO aula (horario, nivel, dia_da_semana) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('sii', $dados['horario'], $dados['nivel'], $dados['dia_da_semana']);

        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $stmt->close();
    }

    function getAula(){
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT horario, nivel, dia_da_semana FROM aula WHERE dia_da_semana > CURDATE() ORDER BY dia_da_semana ASC");
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
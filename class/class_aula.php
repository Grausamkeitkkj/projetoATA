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

    function getAulaHoje(){
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT horario, nivel, dia_da_semana 
            FROM aula 
            WHERE dia_da_semana & (1 << (DAYOFWEEK(CURDATE()) - 1)) 
            ORDER BY dia_da_semana ASC
        ");
        // DAYOFWEEK(CURDATE()) retorna um valor de 1 (domingo) a 7 (sábado)
        // Subtraímos 1 para alinhar com os valores binários definidos (0 para domingo, 1 para segunda, etc.)
        // 1 << (DAYOFWEEK(CURDATE()) - 1) desloca o bit 1 para a posição correta para o dia da semana atual
        // A operação & (AND bit a bit) verifica se o dia da semana atual está incluído no valor 'dia_da_semana'
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
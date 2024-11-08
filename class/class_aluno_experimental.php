<?php

require_once('conexao/conexao.php');

class alunoExperimental{
    
    function addExperimental($dados) {
        global $mysqli;
        
        $stmt = $mysqli->prepare("INSERT INTO aluno_experimental (nome, idade, nivel, data, hora, telefone) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('sissss', $dados['nome'], $dados['idade'], $dados['nivel'], $dados['data'], $dados['hora'], $dados['telefone']);
        
        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $stmt->close();
    }

    function getExperimental() {
        global $mysqli;
        
        $stmt = $mysqli->prepare("SELECT nome, idade, nivel, data, hora, telefone FROM aluno_experimental WHERE data > CURDATE() ORDER BY data ASC");
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
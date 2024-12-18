<?php 

require_once('./conexao/conexao.php');

class Aluno{

    function addAluno($dados) {
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO aluno (nome, idade, telefone, cpf, data_inscricao, faixa, observacoes_medicas, endereco) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('ssissss', $dados['nome'], $dados['idade'], $dados['telefone'], $dados['cpf'], $dados['faixa'], $dados['observacoes_medicas'], $dados['endereco']);
        
        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $stmt->close();
    }

    function getAluno() {
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                a.nome, 
                TIMESTAMPDIFF(YEAR, a.idade, CURDATE()) AS idade, 
                a.telefone, 
                a.cpf, 
                a.data_inscricao, 
                b.cor AS faixa, 
                a.observacoes_medicas, 
                a.endereco 
            FROM 
                aluno a
            LEFT JOIN 
                faixas b ON a.faixa = b.id;
        ");
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
    
    function getAlunoByNome($nome) {
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                a.nome, 
                TIMESTAMPDIFF(YEAR, a.idade, CURDATE()) AS idade, 
                a.telefone, 
                a.cpf, 
                a.data_inscricao, 
                b.cor AS faixa, 
                a.observacoes_medicas, 
                a.endereco 
            FROM 
                aluno a
            LEFT JOIN 
                faixas b ON a.faixa = b.id
            WHERE 
                a.nome LIKE ?
        ");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $nome = "%$nome%";
        $stmt->bind_param('s', $nome);

        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}

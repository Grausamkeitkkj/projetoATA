<?php 

require_once('conexao/conexao.php');

class Aluno{

    function addAluno($dados){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO aluno (nome, idade, nivel, telefone, cpf, data_inscricao, faixa, observacoes_medicas, endereco) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('siisssiss', $dados['nome'], $dados['idade'], $dados['nivel'], $dados['telefone'], $dados['cpf'], $dados['data_inscricao'], $dados['faixa'], $dados['observacoes_medicas'], $dados['endereco']);
        
        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $stmt->close();
    }
}
<?php 

require_once('./conexao/conexao.php');

class Aluno{

    function addAluno($dados){
        global $mysqli;

        #echo "<pre>";
        #print_r($dados);
        #echo "</pre>";
        #die();

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
}
<?php 

require_once('./conexao/conexao.php');

class Aluno{

    function addAluno($dados) {
        global $mysqli;

        $stmt = $mysqli->prepare("
            INSERT INTO aluno 
                (nome, 
                idade, 
                telefone, 
                cpf, 
                data_inscricao, 
                faixa, 
                observacoes_medicas, 
                endereco) 
            VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");
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
                a.id,
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
                a.id,
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

    function getPresencaAluno($dados){
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                contagem_presenca
            FROM 
                contagem_presenca
            WHERE 
                id_aluno = ?
        ");
        if ($stmt === false) {
            die($mysqli->error);
        }

        $stmt->bind_param('i', $dados['id_aluno']);

        if (!$stmt->execute()) {
            die($stmt->error);
        }

        $result = $stmt->get_result();

        $stmt->close();
        
        if ($row = $result->fetch_assoc()) {
            return $row['contagem_presenca'];
        } else {
            return 0;
        }
    }

    function setPresencaAluno($id, $contador){
        global $mysqli;

        $stmt = $mysqli->prepare("
            INSERT INTO contagem_presenca (id_aluno, contagem_presenca)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE
            contagem_presenca = contagem_presenca + VALUES(contagem_presenca)
        ");

        if ($stmt === false){
            die($mysqli->error);
        }

        $stmt->bind_param('ii', $id, $contador);

        if (!$stmt->execute()){
            die($stmt->error);
        }

        $stmt->close();
    }

}

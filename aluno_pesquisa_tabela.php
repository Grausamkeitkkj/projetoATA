<?php

require_once("./class/class_aluno.php");

$aluno = new Aluno();

// Verifica se foi passado um nome para a pesquisa
if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $pesquisaAluno = $aluno->getAlunoByNome($_GET['nome']);
} else {
    $pesquisaAluno = $aluno->getAluno();
}

// Cria um array de alunos
$alunos = [];
while ($row = $pesquisaAluno->fetch_assoc()) {
    $alunos[] = $row;  // Adiciona cada aluno ao array
}

// Retorna os dados no formato JSON
header('Content-Type: application/json');
echo json_encode($alunos);
?>

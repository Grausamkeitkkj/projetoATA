<?php

require_once("./class/class_aluno.php");
require_once("funcoes_uteis.php");

$aluno = new Aluno();

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $pesquisaAluno = $aluno->getAlunoByNome($_GET['nome']);
} else {
    $pesquisaAluno = $aluno->getAluno();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Pesquisa por Aluno</title>
</head>
<body>
    <?php require_once("menu.php"); ?>
    <div class="main-content">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
            <h1 class="form-titulo">Pesquisa por Aluno</h1>
            <form class="form-pesquisa-aluno" action="">
                <div class="form-group">
                    <label for="nome" class="form-label">Nome do aluno</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do aluno" class="form-input" required>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </form>
            <table class="table table-striped table-bordered">
                <thead class="table-header-blue">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Faixa</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Observações médicas</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                        while ($row = $pesquisaAluno->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['idade'] . "</td>";
                            echo "<td>" . $row['faixa'] . "</td>";
                            echo "<td>" . formata_cpf($row['cpf']) . "</td>";
                            echo "<td>" . formata_telefone($row['telefone']) . "</td>";
                            echo "<td>" . $row['observacoes_medicas'] . "</td>";
                            echo "<td>" . $row['endereco'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
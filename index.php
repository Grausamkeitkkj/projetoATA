<?php
require_once("./class/class_aluno_experimental.php");
require_once("funcoes_uteis.php");
require_once("form_experimental.php");
$alunoExperimental = new alunoExperimental();
$result = $alunoExperimental->getExperimental();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="main-content">
    <?php include 'menu.php'; ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
        <div class="box-shadow">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="titulo">Próximas Aulas Experimentais</h1>
                    <table class="table table-striped table-bordered">
                        <thead class="table-header-blue">
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Nível</th>
                                <th>Data</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                if ($row['nivel'] == 1) {
                                    $row['nivel'] = 'Tiger';
                                } elseif ($row['nivel'] == 2) {
                                    $row['nivel'] = 'Adolescente';
                                } else {
                                    $row['nivel'] = 'Adulto';
                                }
                                echo "<tr>";
                                echo "<td>" . $row['nome'] . "</td>";
                                echo "<td>" . $row['idade'] . "</td>";
                                echo "<td>" . $row['nivel'] . "</td>";
                                echo "<td>" . date('d/m/Y', strtotime($row['data'])) . "</td>";
                                echo "<td>" . formata_telefone($row['telefone']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="titulo">Aulas do dia</h1>
                    <table class="table table-striped table-bordered">
                        <thead class="table-header-blue">
                            <tr>
                                <th>Horário</th>
                                <th>Nível</th>
                                <th>Quantidade de Alunos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Adicione aqui as linhas da nova tabela -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
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
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1 class="titulo-experimental">Próximas Aulas Experimentais</h1>
    <div class="container-table">
        <table class="table-experimental">
            <thead>
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
                    if($row['nivel'] == 1){
                        $row['nivel'] = 'Tiger';
                    } elseif($row['nivel'] == 2){
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
</body>
</html>
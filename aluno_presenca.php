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
            <form class="form-pesquisa-aluno" method="GET" action="">
                <div class="form-group">
                    <label for="nome" class="form-label">Nome do aluno</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do aluno" class="form-input" required>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </form>
            <form method="post" action="processa_aluno_presenca.php">
                <table class="table table-striped table-bordered">
                    <thead class="table-header-blue">
                        <tr>
                            <th>Nome</th>
                            <th>Marcar Presença</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                            while ($row = $pesquisaAluno->fetch_assoc()){
                                echo "<tr>";
                                echo "<td class='nome-aluno'>" . $row['nome'] . "</td>";
                                echo "<td><input type='checkbox' class='checkbox-presenca' name='presenca[]' value='" . $row['id'] . "'></td>"; // Adiciona a checkbox
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="selected-names" class="form-label">Nomes Selecionados</label>
                    <div id="selected-names" class="form-input" readonly></div>
                </div>
                <button type="submit" class="btn btn-primary btn-padding-bottom">Salvar Presenças</button>
            </form>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() { // Quando a página carregar
        const checkboxes = document.querySelectorAll('.checkbox-presenca'); // Seleciona todas as checkboxes 
        const selectedNamesContainer = document.getElementById('selected-names'); // Seleciona o campo de nomes selecionados

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() { // Adiciona um evento de mudança para cada checkbox
                updateSelectedNames(); // Atualiza os nomes selecionados
            });
        });

        function updateSelectedNames() {
            selectedNamesContainer.innerHTML = ''; // Limpa o campo de nomes selecionados
            const selectedNames = Array.from(checkboxes) // Converte as checkboxes em um array
                .filter(checkbox => checkbox.checked) // Filtra as checkboxes que estão marcadas
                .map(checkbox => {
                    const name = checkbox.closest('tr').querySelector('.nome-aluno').textContent; // Procura o nome do aluno mais próximo da checkbox
                    return { id: checkbox.value, name }; // Retorna um objeto com o id e o nome do aluno
                });

            selectedNames.forEach(item => {
                const nameElement = document.createElement('span'); // Cria um elemento span
                nameElement.textContent = item.name; // Adiciona o nome do aluno ao elemento span
                nameElement.classList.add('selected-name'); // Adiciona a classe selected-name ao elemento span

                const removeButton = document.createElement('button'); // Cria um elemento button
                removeButton.textContent = 'X'; // Adiciona o texto X ao botão
                removeButton.classList.add('remove-button'); // Adiciona a classe remove-button ao botão
                removeButton.addEventListener('click', function() { // Adiciona um evento de clique ao botão
                    const checkbox = document.querySelector(`input[value="${item.id}"]`); // Procura a checkbox com o id do aluno
                    checkbox.checked = false; // Desmarca a checkbox
                    updateSelectedNames(); // Atualiza os nomes selecionados
                });

                nameElement.appendChild(removeButton); // Adiciona o botão de remoção ao elemento span
                selectedNamesContainer.appendChild(nameElement); // Adiciona o elemento span ao campo de nomes selecionados
            });
        }
    });
</script>
</html>
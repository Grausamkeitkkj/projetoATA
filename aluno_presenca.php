<?php

require_once("./class/class_aluno.php");
require_once("funcoes_uteis.php");

$aluno = new Aluno();

$pesquisaAluno = $aluno->getAluno();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
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
                    <input type="text" id="nome" name="nome" placeholder="Nome do aluno" class="form-input">
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
        const campoNomesSelecionados = document.getElementById('selected-names'); // Seleciona o campo de nomes selecionados

        function atualizarNomesSelecionados() {
            const checkboxes = document.querySelectorAll('.checkbox-presenca'); // Seleciona todas as checkboxes 
            const checkboxesArray = Array.from(checkboxes) // Converte as checkboxes em um array
                .map(checkbox => {
                    const nome = checkbox.closest('tr').querySelector('.nome-aluno').textContent; // Procura o nome do aluno mais próximo da checkbox
                    return { id: checkbox.value, nome, checked: checkbox.checked }; // Retorna um objeto com o id, nome e estado da checkbox
                });

            checkboxesArray.forEach(item => {
                const nomeExistente = campoNomesSelecionados.querySelector(`span[data-id="${item.id}"]`);             

                if (item.checked && !nomeExistente) { // Adiciona o nome se a checkbox estiver marcada e o nome não estiver na lista
                    const nomeElemento = document.createElement('span'); // Cria um elemento span
                    nomeElemento.textContent = item.nome; // Adiciona o nome do aluno ao elemento span
                    nomeElemento.classList.add('selected-name'); // Adiciona a classe selected-name ao elemento span
                    nomeElemento.setAttribute('data-id', item.id); // Adiciona um atributo data-id com o id do aluno
                    // <span class="selected-name" data-id="item.id">item.nome</span>

                    const botaoRemover = document.createElement('button'); // Cria um elemento button
                    botaoRemover.textContent = 'X'; // Adiciona o texto X ao botão
                    botaoRemover.classList.add('remove-button'); // Adiciona a classe remove-button ao botão
                    botaoRemover.addEventListener('click', function() { // Adiciona um evento de clique ao botão
                        const checkbox = document.querySelector(`input[value="${item.id}"]`); // Procura a checkbox com o id do aluno
                        checkbox.checked = false; // Desmarca a checkbox
                        atualizarNomesSelecionados(); // Atualiza os nomes selecionados
                    });

                    nomeElemento.appendChild(botaoRemover); // Adiciona o botão de remoção ao elemento span
                    campoNomesSelecionados.appendChild(nomeElemento); // Adiciona o elemento span ao campo de nomes selecionados
                } else if (!item.checked && nomeExistente) {
                    // Remove o nome se a checkbox estiver desmarcada e o nome estiver na lista
                    nomeExistente.remove();
                }
            });
        }

        // Delegação de eventos para checkboxes adicionadas dinamicamente
        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('checkbox-presenca')) {
                atualizarNomesSelecionados();
            }
        });
    });

    $(document).ready(function(){
        $('.form-pesquisa-aluno').on('submit', function(event){
            event.preventDefault();

            const nome = $('#nome').val();

            $.ajax({
                url: './aluno_pesquisa_tabela.php',
                method: 'GET',
                data: { nome },
                dataType: 'json',
                success: function(data){
                    $('#table-body').empty();

                    data.forEach(function(aluno){
                        $('#table-body').append(`
                            <tr>
                                <td class='nome-aluno'>${aluno.nome}</td>
                                <td><input type='checkbox' class='checkbox-presenca' name='presenca[]' value='${aluno.id}'></td>
                            </tr>
                        `);
                    });

                    // Atualiza os nomes selecionados após adicionar novas linhas
                    atualizarNomesSelecionados();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.error('Erro ao pesquisar alunos:', textStatus, errorThrown);
                    console.error('Detalhes do erro:', jqXHR.responseText);
                    alert('Erro ao pesquisar alunos: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });
    });
    </script>
</html>
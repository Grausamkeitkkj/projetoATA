<?php
require_once("funcoes_uteis.php");
require_once("form_experimental.php");
$alunoExperimental = new alunoExperimental();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
<div class="main-content">
    <?php require_once("menu.php"); ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
        <div class="box-shadow">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h1 class="form-titulo">Cadastro de Aluno</h1>
                    <form class="form-experimental" method="post" action="form_aluno.php">
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="nome" class="form-label">Nome do aluno</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do aluno" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="number" id="idade" name="idade" placeholder="Idade" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" id="data" name="data" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="faixa" class="form-label">Faixa</label>
                                <select type="number" id="faixa" name="faixa" class="form-input" required>
                                    <option value="">Selecione a faixa</option>
                                    <option value="0">Branca</option>
                                    <option value="1">Branca Decidida</option>
                                    <option value="2">Amarela</option>
                                    <option value="3">Amarela Decidida</option>
                                    <option value="4">Laranja</option>
                                    <option value="5">Laranja Decidida</option>
                                    <option value="6">Verde</option>
                                    <option value="7">Verde Decidida</option>
                                    <option value="8">Azul</option>
                                    <option value="9">Azul Decidida</option>
                                    <option value="10">Roxa</option>
                                    <option value="11">Roxa Decidida</option>
                                    <option value="12">Marrom</option>
                                    <option value="13">Marrom Decidida</option>
                                    <option value="14">Preta</option>
                                    <option value="15">Preta Decidida</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="observacoes_medicas" class="form-label">Observações Médicas</label>
                                <textarea id="observacoes_medicas" name="observacoes_medicas" placeholder="Observações Médicas" class="form-input"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" id="endereco" name="endereco" placeholder="Endereço" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/menu.js"></script>
    <!-- Inclua a biblioteca jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</html>
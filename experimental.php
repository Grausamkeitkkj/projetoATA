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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="main-content">
    <?php require_once("menu.php"); ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
        <div class="box-shadow">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h1 class="form-titulo">Cadastro Rápido de Aula Experimental</h1>
                    <form class="form-experimental" method="post" action="form_experimental.php">
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="nome" class="form-label">Nome do aluno</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do aluno" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="number" id="idade" name="idade" placeholder="Idade" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="nivel" class="form-label">Nível</label>
                                <select id="nivel" name="nivel" class="form-input">
                                    <option value="">Selecione o nível</option>
                                    <option value="1">Tiger</option>
                                    <option value="2">Adolescente</option>
                                    <option value="3">Adulto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="data" class="form-label">Data da aula:</label>
                                <input type="date" id="data" name="data" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="hora" class="form-label">Horário da aula:</label>
                                <input type="time" id="hora" name="hora" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <input type="submit" value="Cadastrar" class="form-button btn-sm">
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
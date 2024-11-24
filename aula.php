<?php
require_once("form_aula.php")
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
                    <h1 class="form-titulo">Cadastro de Aula</h1>
                    <form class="form-experimental" method="post" action="form_aula.php">
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="horario" class="form-label">Horário</label>
                                <input type="time" id="horario" name="horario" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label for="nivel" class="form-label">Nível</label>
                                <select id="nivel" name="nivel" class="form-input">
                                    <option value="">Selecione o nível</option>
                                    <option value="0">Sem nível</option>
                                    <option value="1">Tiger</option>
                                    <option value="2">Adolescente</option>
                                    <option value="3">Adulto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid">
                                <label class="form-label">Dias da semana</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="domingo" name="dia_da_semana[]" value="1">
                                    <label class="form-check-label" for="domingo">Domingo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="segunda" name="dia_da_semana[]" value="2">
                                    <label class="form-check-label" for="segunda">Segunda-feira</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terca" name="dia_da_semana[]" value="4">
                                    <label class="form-check-label" for="terca">Terça-feira</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="quarta" name="dia_da_semana[]" value="8">
                                    <label class="form-check-label" for="quarta">Quarta-feira</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="quinta" name="dia_da_semana[]" value="16">
                                    <label class="form-check-label" for="quinta">Quinta-feira</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sexta" name="dia_da_semana[]" value="32">
                                    <label class="form-check-label" for="sexta">Sexta-feira</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sabado" name="dia_da_semana[]" value="64">
                                    <label class="form-check-label" for="sabado">Sábado</label>
                                </div>
                                <div class="form-group">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing container-fluid pt-3">
                                        <input type="submit" value="Cadastrar" class="form-button btn-sm">
                                    </div>
                                </div>
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
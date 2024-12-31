<?php

require_once("./class/class_aluno.php");

$aluno = new Aluno();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    

}
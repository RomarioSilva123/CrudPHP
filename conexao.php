<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomebd = "bancophp";

$conexaoBD = mysqli_connect($servidor,$usuario,$senha,$nomebd);
if (!$conexaoBD) {
    echo "não conectado ao banco";
}else{
    //echo "conectado";
}
?>
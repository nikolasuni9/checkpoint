<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidadePisos = $_POST['quantidadePisos'];
    $margemExtra = $_POST['margemExtra'];
    $quantidadeTotal = ceil($quantidadePisos * (1 + $margemExtra / 100));

    echo $quantidadeTotal;
}
?>
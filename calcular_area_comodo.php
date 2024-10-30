<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $larguraComodo = $_POST['larguraComodo'];
    $comprimentoComodo = $_POST['comprimentoComodo'];
    $areaComodo = $larguraComodo * $comprimentoComodo;

    echo $areaComodo;
}
?>
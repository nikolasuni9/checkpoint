<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $areaComodo = $_POST['areaComodo'];
    $areaPiso = $_POST['areaPiso'];
    $quantidadePisos = ceil($areaComodo / $areaPiso);

    echo $quantidadePisos;
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $larguraPiso = $_POST['larguraPiso'];
    $comprimentoPiso = $_POST['comprimentoPiso'];
    $areaPiso = $larguraPiso * $comprimentoPiso;

    echo $areaPiso;
}
?>
<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
    <h3>Ola <?=$_SESSION["usuario"]->nome ?>, seja bem vindo</h3>
</body>
</html>

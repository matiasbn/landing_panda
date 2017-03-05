<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('127.0.0.1', 'root', '','panda')
    or die('No se pudo conectar: ' . mysql_error());
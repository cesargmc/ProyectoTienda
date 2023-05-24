<?php 

function conectarDB() {
    $db = mysqli_connect('localhost', 'root', 'root', 'tienda_db');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}
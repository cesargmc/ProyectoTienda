<?php

    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Crear email y password
    $email = 'correo@correo.com';
    $password = '123456';

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Query
    $query = " INSERT INTO usuario (email, password, rol_id_rol) VALUES ( '${email}', '${passwordHash}', '1'); ";

    // Agregar a la base de datos
    mysqli_query($db, $query)
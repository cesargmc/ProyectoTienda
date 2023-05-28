<?php

    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Crear email y password
    $email = 'correo@correo.com';
    $password = '123456';

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
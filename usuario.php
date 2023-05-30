<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header("Location: iniciosesion.php");
        exit();
    }

    // Verificar el rol del usuario
    $rol_id = $_SESSION['usuario']['rol_id'];
    if ($rol_id != 1) {
        // El usuario no es administrador
        header("Location: ../index.php");
        exit();
    }

    // Crear email y password
    $email = 'admin@admin.com';
    $password = 'admin';

    // Verificar si el correo ya existe
    $existeEmail = false;
    $queryVerificar = "SELECT email FROM usuario WHERE email = '${email}'";
    $resultado = mysqli_query($db, $queryVerificar);

    if ($resultado->num_rows > 0) {
        $existeEmail = true;
        echo "El correo electrónico ya existe en la base de datos.";
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Query
    $query = " INSERT INTO usuario (email, password, rol_id_rol) VALUES ( '${email}', '${passwordHash}', '1'); ";

    // Agregar a la base de datos
    mysqli_query($db, $query);
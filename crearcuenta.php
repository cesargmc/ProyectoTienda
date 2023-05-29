<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Arreglo de mensaje errores
    $errores = [];

    $usuario = '';
    $nombre = '';
    $apellido = '';
    $email = '';
    $password = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$usuario) {
            $errores[] = "Debes añadir un usuario";
        }

        if(!$nombre) {
            $errores[] = "Debes añadir un nombre";
        }

        if(!$apellido) {
            $errores[] = "Debes añadir un apellido";
        }

        if(!$email) {
            $errores[] = "Debes añadir un email";
        }

        if(!$password) {
            $errores[] = "Debes añadir un password";
        }

        if(empty ($errores)) {
            // Generar un hash del password
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Obtener la fecha actual
            $fechaCreacion = date('Y-m-d');

            // Crear la consulta SQL
            $query = "INSERT INTO usuario (usuario, nombre, apellido, email, password, fecha, rol_id_rol) 
                    VALUES ('$usuario', '$nombre', '$apellido', '$email', '$passwordHash', '$fechaCreacion', '2')";

            // Agregar el usuario a la base de datos
            mysqli_query($db, $query);

            // Redirigir al usuario a la página de inicio de sesión u otra página adecuada
            header("Location: iniciosesion.php");
            exit();
        }
    }

    $login = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Crear cuenta</h1>

        <div class="cuenta">
            <form class="formulario" method="POST" action="crearcuenta.php">
                <input class="formulario__campo" id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre">
                <input class="formulario__campo" id="apellido" name="apellido" type="text" placeholder="Ingrese su apellido">
                <input class="formulario__campo" id="usuario" name="usuario" type="text" placeholder="Ingrese su usuario">
                <input class="formulario__campo" id="email" name="email" type="email" placeholder="Ingrese su correo electronico ">
                <input class="formulario__campo" id="password" name="password" type="password" placeholder="Ingrese su contraseña">
                <input class="formulario__campo" type="password" placeholder="Reingrese su contraseña">
                <input class="formulario__submit" class="formulario__submit" type="submit" value="Registrarme">
                <a href="iniciosesion.php"><p>¿Ya tienes una cuenta?</p></a>
            </form>
        </div>
    </main>
</body>
</html>
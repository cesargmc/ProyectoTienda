<?php
    // Base de datos
    require '/includes/config/database.php';
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
    }

    $login = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Crear cuenta</h1>

        <div class="cuenta">
            <form class="formulario">
                <input class="formulario__campo" type="text" placeholder="Ingrese su nombre">
                <input class="formulario__campo" type="text" placeholder="Ingrese su apellido">
                <input class="formulario__campo" type="text" placeholder="Ingrese su usuario">
                <input class="formulario__campo" type="email" placeholder="Ingrese su correo electronico ">
                <input class="formulario__campo" type="password" placeholder="Ingrese su contraseña">
                <input class="formulario__campo" type="password" placeholder="Reingrese su contraseña">
                <input class="formulario__submit" class="formulario__submit" type="submit" value="Registrarme">
                <a href="iniciosesion.php"><p>¿Ya tienes una cuenta?</p></a>
            </form>
        </div>
    </main>
</body>
</html>
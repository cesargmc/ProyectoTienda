<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB(); 

    // Autenticar usuario
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ));
        $password = $_POST['password'];
    
        if(!$email) {
            $errores[] = "El email es obligatorio o no es valido";
        }
        
        if(!$password) {
            $errores[] = "El password es obligatorio";
        }
    }

    $login = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>

        <div class="cuenta">
            <form class="formulario" method="POST">
                <input class="formulario__campo" name = "email" type="text" placeholder="Ingrese su usuario">
                <input class="formulario__campo" name = "password" type="password" placeholder="Ingrese su contraseña">
                <input class="formulario__submit" type="submit" value="Ingresar">
                <a href="crearcuenta.php"><p>¿No tienes una cuenta?</p></a>
            </form>
        </div>
    </main>
</body>
</html>
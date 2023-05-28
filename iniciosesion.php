<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB(); 


    
    $login = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Iniciar Sesion</h1>

        <div class="cuenta">
            <form class="formulario">
                <input class="formulario__campo" type="text" placeholder="Ingrese su usuario">
                <input class="formulario__campo" type="password" placeholder="Ingrese su contraseña">
                <input class="formulario__submit" type="submit" value="Ingresar">
                <a href="crearcuenta.php"><p>¿No tienes una cuenta?</p></a>
            </form>
        </div>
    </main>
</body>
</html>
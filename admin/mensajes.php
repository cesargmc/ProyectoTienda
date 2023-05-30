<?php
    //Base de datos
    require '../includes/config/database.php';
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

    //Consultar mensajes 
    $consulta = "SELECT * FROM mensaje";
    $resultado = mysqli_query($db, $consulta);

    $mensaje = true;
    include '../includes/templates/header.php';
?>
    
    <main class="contenedor">
        <div clase="admin__mensaje">
            <div class ="cuadros">

                <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                    <div class="cuadro">
                        <h3 class="cuadro__titulo"></h3>
                        <p><?php echo $row['nombre']; ?></p>
                        <p><?php echo $row['email']; ?></p>
                        <p><?php echo $row['mensaje']; ?></p>
                        <input class="formulario__submit" type="submit" value="Eliminar">
                    </div><!-- cuadro -->
                <?php endwhile; ?>

            </div>
        </div>
    </main>
    
</body>
</html>
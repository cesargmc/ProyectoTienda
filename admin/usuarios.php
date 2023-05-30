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
    
    //Consultar usuarios
    $consulta = "SELECT * FROM usuario";
    $resultado = mysqli_query($db, $consulta);

    $usuario = true;
    include '../includes/templates/header.php';
?>

    <main class="contenedor">
        <div class="tablas">
            <table>
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                </thead>

                <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                <?php endwhile; ?>    

            </table>
        </div>
    </main>
</body>
</html>
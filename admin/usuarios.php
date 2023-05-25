<?php
    //Base de datos 
    require 'includes/config/database.php';
    $db = conectarDB();

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
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

    // Consultar ventas con información de producto y usuario
    $consulta = "SELECT p.nombre AS nombre_producto, pv.cantidad, v.costo_total, u.usuario AS nombre_usuario 
                FROM producto p
                INNER JOIN producto_venta pv ON p.id_producto = pv.producto_id_producto
                INNER JOIN venta v ON pv.venta_id_venta = v.id_venta
                INNER JOIN usuario u ON v.usuario_id_usuario = u.id_usuario";

    $resultado = mysqli_query($db, $consulta);

    $ventas = true;
    include '../includes/templates/header.php';
?>

    <main class="contenedor">
        <div class="tablas">
            <table>
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Usuario </th>
                </thead>
                <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                    <tr>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['costo_total']; ?></td>
                        <td><?php echo $row['nombre_usuario']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
    
</body>
</html>
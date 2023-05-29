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

    //Ultimos registros
    $consultaUltimosRegistros = "SELECT * FROM venta ORDER BY id_venta DESC LIMIT 5";
    $resultadoUltimosRegistros = mysqli_query($db, $consultaUltimosRegistros);

    //Ingresos
    $consultaIngresos = "SELECT SUM (costo_total) AS total FROM venta";
    $resultadoIngresos = mysqli_query($db, $consultaIngresos);
    $filaIngresos = mysqli_fetch_assoc ($resultadoIngresos);
    $totalIngresos = $filaIngresos['total'];

    //Producto Mas cantidad
    $consultaMaxCantidad = "SELECT producto_id_producto, MAX (cantidad) AS max_cantidad FROM talla_producto GROUP BY producto_id_producto";
    $resultadoMaxCantidad = mysqli_query ($db, $consultaMaxCantidad);
    $filaMaxCantidad = mysqli_fetch_assoc ($resultadoMaxCantidad);
    $productoMayorCantidadID = $filaMaxCantidad ['producto_id_producto'];
    $maxCantidad = $filaMaxCantidad ['max_cantidad'];

    //Consultar el nombre del producto con mayor cantidad
    $consultaProductoMayorCantidad = "SELECT nombre FROM producto WHERE id_producto = $productoMayorCantidad";
    $resultadoProductoMayorCantidad = mysqli_query($db, $consultaProductoMayorCantidad);
    $filaProductoMayorCantidad = mysqli_fetch_assoc($resultadoProductoMayorCantidad);
    $productoMayorCantidad = $filaProductoMayorCantidad['nombre'];

    /**------------------ **/

    //Producto Menos cantidad
    $consultaMinCantidad = "SELECT producto_id_producto, MIN(cantidad) AS min_cantidad FROM talla_producto GROUP BY producto_id_producto";
    $resultadoMinCantidad = mysqli_fetch_assoc($db, $consultaMinCantidad);
    $filaMinCantidad = mysqli_fetch_assoc($resultadoMinCantidad);
    $productoMenorCantidadID = $filaMinCantidad ['producto_id_producto'];
    $minCantidad = $filaMinCantidad['min_cantidad'];

    //Consultar el nombre del producto con menor cantidad
    $consultaProductoMenorCantidad = "SELECT nombre FROM producto WHERE id_prodicto = $productoMenorCantidadID";
    $resultadoProductoMenorCantidad = mysqli_query($db, $consultaProductoMenorCantidad);
    $filaProductoMenorCantidad = mysqli_fetch_assoc($resultadoProductoMenorCantidad);
    $productoMenorCantidad = $filaProductoMenorCantidad['nombre'];

    $inicio = true;
    include '../includes/templates/header.php';
?>
    
    <main class="contenedor">
        <div class ="cuadros">
            <div class="cuadro">
                <h3 class="cuadro__titulo">Últimos registros</h3>
                <?php while($row = mysqli_fetch_assoc($resultadoUltimosRegistros) ) : ?>
                    <p><?php echo $row['id_venta']; ?></p>
                <?php endwhile; ?> 
            </div><!-- cuadro -->
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Ingresos</h3>
                <p><?php echo $totalIngresos; ?></p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con más cantidad</h3>
                <p><?php echo $productoMayorCantidad; ?></p>
                <p><?php echo $maxCantidad; ?></p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con menos cantidad</h3>
                <p><?php echo $productoMenorCantidad; ?></p>
                <p><?php echo $minCantidad; ?></p>
            </div>
        </div>
    </main>

</body>
</html>
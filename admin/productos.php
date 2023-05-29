<?php
    // Base de datos
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

    // Escribir el Query
    $query = "SELECT * FROM producto";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        // Validacion input
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            // Eliminar imagen
            $query = "SELECT imagen FROM producto WHERE id_producto = ${id}";
            $resultado = mysqli_query($db, $query);
            $productoImagen = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $productoImagen['imagen']);

            // Eliminar producto
            $queryProducto = "DELETE FROM producto WHERE id_producto = ${id}";
            $resultado = mysqli_query($db, $queryProducto);

            var_dump($query);

            if($resultado) {
                header('Location: productos.php?resultado=3');
            }
        }
    }
    
    function obtenerCantidadTotal($idProducto, $db) {
        $query = "SELECT SUM(cantidad) AS total FROM talla_producto WHERE producto_id_producto = ${idProducto}";
        $resultado = mysqli_query($db, $query);
        $fila = mysqli_fetch_assoc($resultado);
        return $fila['total'];
    }

    // Template
    $productos = true;
    include '../includes/templates/header.php';
?>


    <main class="contenedor">
        <?php if($resultado == 1): ?>
            <p class="alerta exito">Producto Registrado Correctamente</p>
        <?php elseif($resultado == 2): ?>
            <p class="alerta exito">Producto Actualizado Correctamente</p>
        <?php elseif($resultado == 3): ?>
            <p class="alerta exito">Producto Eliminado Correctamente</p>
        <?php endif; ?>

        <div class="admin__producto">
            <div class="nuevo-producto">
                <a href="productos/crear.php" class="link-right">
                    <input class="nuevo-producto__boton" type="button" value="Añadir Producto">
                </a>
            </div>
    
            <table class="tabla__producto">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </thead>
                <?php while( $producto = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td class="nombre"><?php echo $producto['nombre']; ?></td>
                    <td><?php echo obtenerCantidadTotal($producto['id_producto'], $db); ?></td>
                    <td>$<?php echo $producto['precio']; ?></td>
                    <td class="crud">
                        <div class="crud__acciones">
                            <a href="productos/actualizar.php?id=<?php echo $producto['id_producto']; ?>" class="crud__accion">Actualizar</a>
                            <form method="POST">
                                <input type="hidden" class="crud__accion" name="id" value="<?php echo $producto['id_producto'] ?>">
                                <input type="submit" class="crud__accion" value="Eliminar">
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
</body>
</html>
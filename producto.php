<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Validacion
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: index.php');
    }

    // Consulta
    $query = "SELECT * FROM producto WHERE id_producto = ${id}";
    $resultado = mysqli_query($db, $query);

    // Validacion
    if(!$resultado->num_rows) {
        header('Location: index.php');
    }

    $producto = mysqli_fetch_assoc($resultado);

    // Guardar información de la imagen en una variable de sesión
    $imagenProducto = $producto['imagen'];

    $consulta = "SELECT * FROM talla";
    $resultadoTallas = mysqli_query($db, $consulta);
    
    $productoI = true;
    include './includes/templates/header.php';

    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header("Location: iniciosesion.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idProducto = $_POST['id_producto'];
        $idProducto = filter_var($idProducto, FILTER_VALIDATE_INT);
    
        $idUsuario = $_SESSION['usuario']['id_usuario'];
    
        $cantidad = $_POST['cantidad'];
        $cantidad = filter_var($cantidad, FILTER_VALIDATE_INT);

        if ($idProducto && $idUsuario && $cantidad) {
            $idTalla = $_POST['talla'];
            $idTalla = filter_var($idTalla, FILTER_VALIDATE_INT);

            // Obtener la cantidad actual del producto
            $query = "SELECT cantidad FROM talla_producto WHERE producto_id_producto = ${idProducto} AND talla_id_talla = ${idTalla}";
            $resultado = mysqli_query($db, $query);
            $tallaProducto = mysqli_fetch_assoc($resultado);
            $cantidadActual = $tallaProducto['cantidad'];

            // Verificar si la cantidad disponible es suficiente
            if ($cantidad > $cantidadActual) {
                // No hay suficiente stock, muestra un mensaje de error
                echo "<script>alert('No hay suficiente stock disponible'); window.location.href = 'producto.php?id=" . $id . "';</script>";
            } else {
                // Restar la cantidad comprada de la cantidad actual del producto
                $cantidadRestante = $cantidadActual - $cantidad;

                // Actualizar la cantidad en la base de datos
                $query = "UPDATE talla_producto SET cantidad = ${cantidadRestante} WHERE producto_id_producto = ${idProducto} AND talla_id_talla = ${idTalla}";
                mysqli_query($db, $query);

                // Continuar con el proceso de compra
                $query = "INSERT INTO venta (costo_total, usuario_id_usuario) VALUES (0, ${idUsuario})";
                mysqli_query($db, $query);
                $idVenta = mysqli_insert_id($db);
        
                $precio = $producto['precio'];
                $costoTotal = $precio * $cantidad;
                $query = "UPDATE venta SET costo_total = ${costoTotal} WHERE id_venta = ${idVenta}";
                mysqli_query($db, $query);
        
                $fecha = date('Y-m-d');
                $query = "INSERT INTO producto_venta (producto_id_producto, venta_id_venta, cantidad, fecha) VALUES (${idProducto}, ${idVenta}, ${cantidad}, '${fecha}')";
                mysqli_query($db, $query);
        
                echo "<script>alert('Compra realizada correctamente'); window.location.href = 'producto.php?id=" . $id . "';</script>";
            }
        } else {
            echo "<script>alert('Compra realizada incorrectamente'); window.location.href = 'producto.php?id=" . $id . "';</script>";
        }
    }
?>

    <main class="contenedor">
        <h1><?php echo $producto['nombre']; ?></h1>

        <div class="camisa">
            <img class="camisa__imagen" src="/imagenes/<?php echo $imagenProducto; ?>" alt="Imagen del producto">

            <div class="camisa__contenido">
                <p><?php echo $producto['descripcion']; ?></p>

                <form class="formulario" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                    <select class="formulario__campo" name="talla">
                        <option disabled selected value="">-- Seleccionar Talla --</option>
                        <?php while($row = mysqli_fetch_assoc($resultadoTallas) ) : ?>
                            <option value="<?php echo $row['id_talla']; ?>"><?php echo $row['descripcion'] . ""; ?></option>
                        <?php endwhile ?>
                    </select>
                    <input class="formulario__campo" type="number" name="cantidad" placeholder="Cantidad" min="1">
                    <input class="formulario__submit" type="submit" value="Comprar">
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p class="footer__texto">VT & CG Store - Derechos Reservados 2023.</p>
    </footer>
</body>

</html>
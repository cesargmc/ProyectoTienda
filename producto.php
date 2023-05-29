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

    $consulta = "SELECT * FROM talla";
    $resultado = mysqli_query($db, $consulta);
    
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
            // Obtener la cantidad actual del producto
            $query = "SELECT cantidad FROM talla_producto WHERE producto_id_producto = ${idProducto}";
            $resultado = mysqli_query($db, $query);
            $tallaProducto = mysqli_fetch_assoc($resultado);
            $cantidadActual = $tallaProducto['cantidad'];

            // Verificar si la cantidad disponible es suficiente
            if ($cantidad > $cantidadActual) {
                // No hay suficiente stock, muestra un mensaje de error
                echo "<script>alert('No hay suficiente stock disponible'); window.location.href = 'producto.php?id=" . $id . "';</script>";

            }
        }
    }
?>

    <main class="contenedor">
        <h1><?php echo $producto['nombre']; ?></h1>

        <div class="camisa">
            <img class="camisa__imagen" src="/imagenes/<?php echo $producto['imagen']; ?>" alt="Imagen del producto">

            <div class="camisa__contenido">
                <p><?php echo $producto['descripcion']; ?></p>

                <form class="formulario">
                    <select class="formulario__campo">
                        <option disabled selected value="">-- Seleccionar Talla --</option>
                        <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                            <option value="<?php echo $row['id_talla']; ?>"><?php echo $row['descripcion'] . ""; ?></option>
                        <?php endwhile ?>
                    </select>
                    <input class="formulario__campo" type="number" placeholder="Cantidad" min="1">
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
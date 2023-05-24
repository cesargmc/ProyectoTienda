<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar las tallas
    $consulta = "SELECT * FROM talla";
    $resultado = mysqli_query($db, $consulta);

    $producto = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Producto</h1>

        <div class="camisa">
            <img class="camisa__imagen" src="img/1.jpg" alt="Imagen del producto">

            <div class="camisa__contenido">
                <p>Vestibulum pellentesque iaculis mauris sit amet fermentum. Nunc eleifend ex eget vehicula rhoncus. Integer semper porta purus. Quisque tristique nec erat quis placerat. Nulla consequat, velit eu tristique varius, ligula orci accumsan magna, et egestas ipsum nulla id sapien. Fusce sit amet felis odio. Donec vulputate urna mattis arcu imperdiet iaculis. Suspendisse blandit tortor id eros suscipit dapibus.</p>

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
<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar
    $query = "SELECT * FROM producto";

    // Resultado
    $resultado = mysqli_query($db, $query);


    $index = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Nuestros Productos</h1>

        <div class="grid">
        <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
            <div class="producto">
                <a href="producto.php?id=<?php echo $producto['id_producto']; ?>">
                    <img class="producto__imagen" src="/imagenes/<?php echo $producto['imagen']; ?>" alt="Imagen de camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre"><?php echo $producto['nombre']; ?></p>
                        <p class="producto__precio">$<?php echo $producto['precio']; ?></p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
            <div class="grafico"></div> <!--Imagenes de muestra no esta listo-->
        </div>
    </main>

    <footer class="footer">
        <p class="footer__texto">VT & CG Store - Derechos Reservados 2023 C.</p>
    </footer>
</body>
</html>
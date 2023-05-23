<?php
    $inicio = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Nuestros Productos</h1>

        <div class="grid">
            <div class="producto">
                <a href="producto.php">
                    <img class="producto__imagen" src="img/1.jpg" alt="Imagen de camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Producto 1</p>
                        <p class="producto__precio">$300</p>
                    </div>
                </a>
            </div>

            <div class="grafico"></div> <!--Imagenes de muestra no esta listo-->
        </div>
    </main>

    <footer class="footer">
        <p class="footer__texto">VT & CG Store - Derechos Reservados 2023.</p>
    </footer>
</body>
</html>
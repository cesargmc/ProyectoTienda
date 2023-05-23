<?php
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
                        <option disabled selected>-- Seleccionar Talla --</option>
                        <option>Extra Chica</option>
                        <option>Chica</option>
                        <option>Mediana</option>
                        <option>Grande</option>
                        <option>Extra Grande</option>
                    </select>
                    <input class="formulario__campo" type="number" placeholder="Cantidad">
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
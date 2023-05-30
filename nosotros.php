<?php
    $nosotros = true;
    include './includes/templates/header.php';
?>

    <main class="contenedor">
        <h1>Nosotros</h1>

        <div class="nosotros">
            <div class="nosotros__contenido">
                <p>Quisque maximus ornare odio vel mattis. Etiam bibendum dignissim felis, non lacinia sem ullamcorper sit amet. Duis feugiat vitae odio at blandit. In at purus sit amet neque posuere pulvinar. Vestibulum pellentesque iaculis mauris sit amet fermentum. Nunc eleifend ex eget vehicula rhoncus. Integer semper porta purus. Quisque tristique nec erat quis placerat. Nulla consequat, velit eu tristique varius, ligula orci accumsan magna, et egestas ipsum nulla id sapien. Fusce sit amet felis odio. Donec vulputate urna mattis arcu imperdiet iaculis. Suspendisse blandit tortor id eros suscipit dapibus.</p>
                
                <p>Vivamus ut nulla vel nisi egestas porta at ac nisl. Ut quis leo mi. Cras vehicula leo lobortis nulla dapibus, nec efficitur est tincidunt. Curabitur et semper sem.</p>
            </div>
            <img class="nosotros__imagen" src="img/nosotros.jpg" alt="Imagen nosotros">
        </div>

        <h2>Mensaje</h2>

        <div class="mensaje">
            <form class="formulario__mensaje" method="POST">
                <input class="formulario__mensaje-campo" type="text" placeholder="Introduzca su nombre">
                <input class="formulario__mensaje-campo" type="text" placeholder="Introduzca su correo">
                <textarea class="formulario__mensaje-campo" name="" id="" placeholder="Comente aquí"></textarea>
            </form>
        </div>
    </main>

    <section class="contenedor comprar">
        <h2>¿Porqué comprar con nosotros?</h2>

        <div class="bloques">
            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_1.png" alt="Porque comprar">
                <h3 class="bloque__titulo">El Mejor Precio</h3>
                <p>Quisque maximus ornare odio vel mattis. Etiam bibendum dignissim felis, non lacinia sem ullamcorper sit amet.</p>
            </div><!-- bloque -->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_2.png" alt="Porque comprar">
                <h3 class="bloque__titulo">Envio Gratis</h3>
                <p>Quisque maximus ornare odio vel mattis. Etiam bibendum dignissim felis, non lacinia sem ullamcorper sit amet.</p>
            </div><!-- bloque -->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_3.png" alt="Porque comprar">
                <h3 class="bloque__titulo">La Mejor Calidad</h3>
                <p>Quisque maximus ornare odio vel mattis. Etiam bibendum dignissim felis, non lacinia sem ullamcorper sit amet.</p>
            </div><!-- bloque -->
        </div>
    </section>

    <footer class="footer">
        <p class="footer__texto">VT & CG Store - Derechos Reservados 2023.</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT & CG Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <a href="index.html">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
        <a href="iniciosesion.html">
            <img class="header__login" src="img/usuario.png" alt="">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="index.html">Tienda</a>
        <a class="navegacion__enlace" href="nosotros.html">Nosotros</a>
    </nav>

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
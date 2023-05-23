<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador </title>
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

    <nav class="navegacion-admin">
        <a class="navegacion-admin__enlace" href="administrador.html">Inicio</a>
        <a class="navegacion-admin__enlace" href="admin-producto.html">Productos</a>
        <a class="navegacion-admin__enlace" href="admin-ventas.html">Ventas</a>
        <a class="navegacion-admin__enlace" href="admin-usuarios.html">Usuarios</a>
        <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="admin-mensaje.html">Mensajes</a>
        <a class="navegacion-admin__enlace" href="iniciosesion.html">Cerrar Sesion</a>
    </nav>
    
    <main class="contenedor">
        <div clase="admin__mensaje">
            <div class ="cuadros">
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p>Nombre</p>
                    <p>Correo</p>
                    <p>Mensaje</p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div><!-- cuadro -->
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p>Nombre</p>
                    <p>Correo</p>
                    <p>Mensaje</p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p>Nombre</p>
                    <p>Correo</p>
                    <p>Mensaje</p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p>Nombre</p>
                    <p>Correo</p>
                    <p>Mensaje</p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            </div>
        </div>
    </main>
</body>
</html>
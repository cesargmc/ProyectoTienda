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
        <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="administrador.html">Inicio</a>
        <a class="navegacion-admin__enlace" href="admin-producto.html">Productos</a>
        <a class="navegacion-admin__enlace" href="admin-ventas.html">Ventas</a>
        <a class="navegacion-admin__enlace" href="admin-usuarios.html">Usuarios</a>
        <a class="navegacion-admin__enlace" href="admin-mensaje.html">Mensajes</a>
        <a class="navegacion-admin__enlace" href="iniciosesion.html">Cerrar Sesion</a>
    </nav>
    
    <main class="contenedor">
        <div class ="cuadros">
            <div class="cuadro">
                <h3 class="cuadro__titulo">Últimos registros</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla elit ac dolor posuere, vitae aliquet urna iaculis.</p>
            </div><!-- cuadro -->
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Ingresos</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla elit ac dolor posuere, vitae aliquet urna iaculis.</p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con más cantidad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla elit ac dolor posuere, vitae aliquet urna iaculis.</p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con menos cantidad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla elit ac dolor posuere, vitae aliquet urna iaculis.</p>
            </div>
        </div>
    </main>

</body>
</html>
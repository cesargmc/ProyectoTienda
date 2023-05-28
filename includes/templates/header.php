<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT & CG Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="header">
        <a href="../index.php">
            <img class="header__logo" src="/img/logo.png" alt="Logotipo">
        </a>
        <a href="iniciosesion.php">
            <img class="header__login" src="/img/usuario.png" alt="">
        </a>
    </header>

    <?php if ($index) { ?>
        <nav class="navegacion">
            <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Tienda</a>
            <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>
        </nav>
    <?php } elseif ($nosotros) { ?>
        <nav class="navegacion">
            <a class="navegacion__enlace" href="index.php">Tienda</a>
            <a class="navegacion__enlace navegacion__enlace--activo" href="nosotros.php">Nosotros</a>
        </nav>
    <?php } elseif ($productoI) { ?>
        <nav class="navegacion">
            <a class="navegacion__enlace" href="index.php">Tienda</a>
            <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>
        </nav>
    <?php } elseif ($login) { ?>
        
    <?php } elseif ($inicio) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="index.php">Inicio</a>
            <a class="navegacion-admin__enlace" href="productos.php">Productos</a>
            <a class="navegacion-admin__enlace" href="ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace" href="usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace" href="mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php } elseif ($productos) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace" href="index.php">Inicio</a>
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="/admin/productos.php">Productos</a>
            <a class="navegacion-admin__enlace" href="ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace" href="usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace" href="mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php } elseif ($crud) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace" href="../../admin/index.php">Inicio</a>
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="../../admin/productos.php">Productos</a>
            <a class="navegacion-admin__enlace" href="../../admin/ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace" href="../../admin/usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace" href="../../admin/mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="../../admin/iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php } elseif ($ventas) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace" href="index.php">Inicio</a>
            <a class="navegacion-admin__enlace" href="productos.php">Productos</a>
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace" href="usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace" href="mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php } elseif ($usuario) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace" href="index.php">Inicio</a>
            <a class="navegacion-admin__enlace" href="productos.php">Productos</a>
            <a class="navegacion-admin__enlace" href="ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace" href="mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php } else { if  ($mensaje) { ?>
        <nav class="navegacion-admin">
            <a class="navegacion-admin__enlace" href="index.php">Inicio</a>
            <a class="navegacion-admin__enlace" href="productos.php">Productos</a>
            <a class="navegacion-admin__enlace" href="ventas.php">Ventas</a>
            <a class="navegacion-admin__enlace" href="usuarios.php">Usuarios</a>
            <a class="navegacion-admin__enlace navegacion-admin__enlace--activo" href="mensajes.php">Mensajes</a>
            <a class="navegacion-admin__enlace" href="iniciosesion.php">Cerrar Sesion</a>
        </nav>
    <?php }} ?>
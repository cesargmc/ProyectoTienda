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
        <a href="index.php">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
        <a href="iniciosesion.php">
            <img class="header__login" src="img/usuario.png" alt="">
        </a>
    </header>

    <?php if($inicio) { ?>
        <nav class="navegacion">
            <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Tienda</a>
            <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>
        </nav>
    <?php } ?>
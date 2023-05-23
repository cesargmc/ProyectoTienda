<?php
    $productos = true;
    include './includes/templates/header.php';
?>

    <div class="admin-añadir-producto">
        <form class="añadir" >
            <p>Nombre del producto:</p>
            <input class="formulario__campo" required><br>
        
            <p>Precio:</p>
            <input class="formulario__campo" required><br>

            <p>Talla S:</p>
            <input type="number" class="formulario__campo" required><br>

            <p>Talla M:</p>
            <input type="number" class="formulario__campo" required><br>

            <p>Talla L:</p>
            <input type="number" class="formulario__campo" required><br>
        
            <p>Descripcion</p>
            <textarea class="formulario__campo" required></textarea><br>

            <p>Imagen</p>
            <div class="imagen-añadirproducto">
                <img src="img/boton-subir-a-la-nube.png" >
            </div>
            <input class="formulario__submit" type="file" accept="image/" required>
            <br><br>
            <input class="formulario__submit" type="submit" value="Registrar Producto">
        </form>
    </div>

</body>
</html>
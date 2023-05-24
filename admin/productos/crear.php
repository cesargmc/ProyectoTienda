<?php
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();


    $crear = true;
    include '../../includes/templates/header.php';
?>

    <div class="admin-añadir-producto">
        <form class="añadir" >
            <p>Nombre del producto:</p>
            <input class="formulario__campo" id="producto" placeholder="Producto Titulo" required><br>
        
            <p>Precio:</p>
            <input class="formulario__campo" id="precio" placeholder="Ej: $300" type="number" min="1" required><br>

            <p>Talla S:</p>
            <input class="formulario__campo" id="talla__s" type="number" min="1" required><br>

            <p>Talla M:</p>
            <input class="formulario__campo" id="talla__m" type="number" min="1" required><br>

            <p>Talla L:</p>
            <input class="formulario__campo" id="talla__l" type="number" min="1" required><br>
        
            <p>Descripcion</p>
            <textarea class="formulario__campo" id="descripcion" required></textarea><br>

            <p>Imagen</p>
            <div class="imagen-añadirproducto">
                <img src="../../img/boton-subir-a-la-nube.png" >
            </div>
            <input class="formulario__campo" id="imagen" type="file" accept="image/png , img/jpg" required>
            <br><br>
            <input class="formulario__submit" type="submit" value="Registrar Producto">
        </form>
    </div>

</body>
</html>
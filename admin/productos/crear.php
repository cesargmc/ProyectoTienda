<?php
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Arreglo de mensaje errores
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];

        if(!$nombre) {
            $errores[] = "Debes añadir un nombre";
        }

        if(!$precio) {
            $errores[] = "Debes añadir el precio";
        }

        if(!$descripcion) {
            $errores[] = "Debes añadir una descripcion";
        }

        echo "<pre>";
        var_dump($errores);
        echo "</pre>";

        exit;

        if(empty ($errores)) {
            // Insertar en la base de datos
            $query = " INSERT INTO producto ( nombre, precio, descripcion ) VALUES ( '$nombre', '$precio', '$descripcion' ) ";

            $resultado = mysqli_query($db, $query);
        }
    }


    $crear = true;
    include '../../includes/templates/header.php';
?>

    <div class="admin-añadir-producto">
        <form class="añadir" method="POST" action="/admin/productos/crear.php">
            <p>Nombre del producto:</p>
            <input class="formulario__campo" id="nombre" name="nombre"><br>
        
            <p>Precio:</p>
            <input class="formulario__campo" id="precio" name="precio" type="number" min="1"><br>

            <p>Talla S:</p>
            <input class="formulario__campo" id="talla__s" name="talla__s" type="number" min="1"><br>

            <p>Talla M:</p>
            <input class="formulario__campo" id="talla__m" name="talla__m" type="number" min="1"><br>

            <p>Talla L:</p>
            <input class="formulario__campo" id="talla__l" name="talla__l" type="number" min="1"><br>
        
            <p>Descripcion</p>
            <textarea class="formulario__campo" id="descripcion" name="descripcion"></textarea><br>

            <p>Imagen</p>
            <div class="imagen-añadirproducto">
                <img src="../../img/boton-subir-a-la-nube.png" >
            </div>
            <input class="formulario__campo" id="imagen" type="file" accept="image/png , img/jpg">
            <br><br>
            <input class="formulario__submit" type="submit" value="Registrar Producto">
        </form>
    </div>

</body>
</html>
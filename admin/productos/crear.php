<?php
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Arreglo de mensaje errores
    $errores = [];

    $nombre = '';
    $precio = '';
    $descripcion = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];

        // Files para una variable

        $imagen = $_FILES['imagen'];

        if(!$nombre) {
            $errores[] = "Debes añadir un nombre";
        }

        if(!$precio) {
            $errores[] = "Debes añadir el precio";
        }

        if(!$descripcion) {
            $errores[] = "Debes añadir una descripcion";
        }

        if(!$imagen['name']) {
            $errores[] = "Debes añadir una imagen";
        }

        if(empty ($errores)) {
            // Subida de archivos
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Subida de imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            // Insertar en la base de datos
            $query = " INSERT INTO producto ( nombre, precio, descripcion, imagen ) VALUES ( '$nombre', '$precio', '$descripcion', '$nombreImagen' ) ";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: ../productos.php?resultado=1');
            }
        }
    }


    $crud = true;
    include '../../includes/templates/header.php';
?>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;  ?>
            </div>
        <?php endforeach; ?>
        <div class="admin-añadir-producto">
            <form class="añadir" method="POST" action="/admin/productos/crear.php" enctype="multipart/form-data">
                <p>Nombre del producto:</p>
                <input class="formulario__campo" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br>
            
                <p>Precio:</p>
                <input class="formulario__campo" id="precio" name="precio" type="number" min="1" value="<?php echo $precio; ?>"><br>

                <p>Talla S:</p>
                <input class="formulario__campo" id="talla__s" name="talla__s" type="number" min="1"><br>

                <p>Talla M:</p>
                <input class="formulario__campo" id="talla__m" name="talla__m" type="number" min="1"><br>

                <p>Talla L:</p>
                <input class="formulario__campo" id="talla__l" name="talla__l" type="number" min="1"><br>
            
                <p>Descripcion</p>
                <textarea class="formulario__campo" id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea><br>

                <p>Imagen</p>
                <div class="imagen-añadirproducto">
                    <img src="../../img/boton-subir-a-la-nube.png" >
                </div>
                <input class="formulario__campo" id="imagen" name="imagen" type="file" accept="img/jpeg , image/png">
                <br><br>
                <input class="formulario__submit" type="submit" value="Registrar Producto">
            </form>
        </div>
    </main>
</body>
</html>
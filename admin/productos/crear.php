<?php
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header("Location: iniciosesion.php");
        exit();
    }

    // Verificar el rol del usuario
    $rol_id = $_SESSION['usuario']['rol_id'];
    if ($rol_id != 1) {
        // El usuario no es administrador
        header("Location: ../index.php");
        exit();
    }

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

            // Obtener el id_producto recién insertado
            $idProducto = mysqli_insert_id($db);

            // Obtener la cantidad de la talla
            $cantidadS = $_POST['talla__s'];
            $cantidadM = $_POST['talla__m'];
            $cantidadL = $_POST['talla__l'];

            if(!$cantidadS) {
                $errores[] = "Debes añadir una cantidad en S";
            }

            if(!$cantidadM) {
                $errores[] = "Debes añadir una cantidad en M";
            }

            if(!$cantidadL) {
                $errores[] = "Debes añadir una cantidad en L";
            }

            if(empty ($errores)) {
                // Insertar en la tabla talla_producto
                $queryTallaS = "INSERT INTO talla_producto (talla_id_talla, producto_id_producto, cantidad) VALUES (1, '$idProducto', '$cantidadS')";
                $queryTallaM = "INSERT INTO talla_producto (talla_id_talla, producto_id_producto, cantidad) VALUES (2, '$idProducto', '$cantidadM')";
                $queryTallaL = "INSERT INTO talla_producto (talla_id_talla, producto_id_producto, cantidad) VALUES (3, '$idProducto', '$cantidadL')";

                $resultadoTallaS = mysqli_query($db, $queryTallaS);
                $resultadoTallaM = mysqli_query($db, $queryTallaM);
                $resultadoTallaL = mysqli_query($db, $queryTallaL);

                if($resultadoTallaS && $resultadoTallaM && $resultadoTallaL) {
                    header('Location: ../productos.php?resultado=1');
                }
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
            <form method="POST" action="/admin/productos/crear.php" enctype="multipart/form-data">
                <p>Nombre del producto:</p>
                <input class="formulario__campo" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br>
            
                <p>Precio:</p>
                <input class="formulario__campo" id="precio" name="precio" type="number" min="1" value="<?php echo $precio; ?>"><br>

                <p>Talla S:</p>
                <input class="formulario__campo" id="talla__s" name="talla__s" type="number" min="1" value="<?php echo $cantidadS; ?>"><br>

                <p>Talla M:</p>
                <input class="formulario__campo" id="talla__m" name="talla__m" type="number" min="1" value="<?php echo $cantidadM; ?>"><br>

                <p>Talla L:</p>
                <input class="formulario__campo" id="talla__l" name="talla__l" type="number" min="1" value="<?php echo $cantidadL; ?>"><br>
            
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
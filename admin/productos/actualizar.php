<?php
    // Validar ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin/productos.php');
    }
    
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos del producto
    $consulta = "SELECT * FROM producto WHERE id_producto = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $producto = mysqli_fetch_assoc($resultado);

    // Arreglo de mensaje errores
    $errores = [];

    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $descripcion = $producto['descripcion'];
    $imagenProducto = $producto['imagen'];

    // Obtener las cantidades de las tallas del producto
    $consultaCantidades = "SELECT cantidad FROM talla_producto WHERE producto_id_producto = ${id}";
    $resultadoCantidades = mysqli_query($db, $consultaCantidades);
    $tallas = mysqli_fetch_all($resultadoCantidades, MYSQLI_ASSOC);

    $cantidadS = $tallas[0]['cantidad'];
    $cantidadM = $tallas[1]['cantidad'];
    $cantidadL = $tallas[2]['cantidad'];

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

        if(empty ($errores)) {
            /** Subida de archivos **/ 
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                 mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // Eliminar imagen previa
            if($imagen['name']){
                unlink($carpetaImagenes . $producto['imagen']);

                // Nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // Subida de imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $producto['imagen'];
            }

            // Insertar en la base de datos
            $query = " UPDATE producto SET nombre = '${nombre}', precio = '${precio}', descripcion = '${descripcion}', imagen = '${nombreImagen}' WHERE id_producto = ${id}";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Actualizar las cantidades de las tallas en la tabla talla_producto
                $nuevaCantidadS = $_POST['tallas'];
                $nuevaCantidadM = $_POST['tallam'];
                $nuevaCantidadL = $_POST['talla__l'];

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
            <form class="añadir" method="POST" enctype="multipart/form-data">
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
                    <img src="/imagenes/<?php echo $imagenProducto; ?>" >
                </div>
                <input class="formulario__campo" id="imagen" name="imagen" type="file" accept="img/jpeg , image/png">
                <br><br>
                <input class="formulario__submit" type="submit" value="Actualizar Producto">
            </form>
        </div>
    </main>
</body>
</html>
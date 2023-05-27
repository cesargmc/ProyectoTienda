<?php
    // Base de datos
    require '../includes/config/database.php';
    $db = conectarDB();

    // Escribir el Query
    $query = "SELECT * FROM producto";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'];

    // Template
    $productos = true;
    include '../includes/templates/header.php';
?>


    <main class="contenedor">
        <?php if($resultado == 1): ?>
            <p class="alerta exito">Producto registrado correctamente</p>
        <?php elseif($resultado == 2): ?>
            <p class="alerta exito">Producto actualizado correctamente</p>
        <?php endif; ?>

        <div class="admin__producto">
            <div class="nuevo-producto">
                <a href="productos/crear.php" class="link-right">
                    <input class="nuevo-producto__boton" type="button" value="Añadir Producto">
                </a>
            </div>
    
            <table class="tabla__producto">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </thead>
                <?php while( $producto = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td class="nombre"><?php echo $producto['nombre']; ?></td>
                    <td><?php  ?></td>
                    <td>$<?php echo $producto['precio']; ?></td>
                    <td class="crud">
                        <div class="crud__acciones">
                            <a href="productos/actualizar.php?id=<?php echo $producto['id_producto']; ?>" class="crud__accion">Actualizar</a>
                            <form method="POST">
                                <input type="submit" class="crud__accion" value="Eliminar">
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
</body>
</html>
<?php
    $resultado = $_GET['resultado'];

    $productos = true;
    include '../includes/templates/header.php';
?>


    <main class="contenedor">
        <?php if($resultado == 1): ?>
            <p class="alerta exito">Producto registrado correctamente</p>
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
                <tr>
                    <td>Nombre</td>
                    <td>45</td>
                    <td>$500</td>
                    <td><input class="tabla__boton" type="submit" value="Editar">  <input class="tabla__submit" type="submit" value="Eliminar"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>45</td>
                    <td>$500</td>
                    <td><input class="tabla__boton" type="submit" value="Editar">  <input class="tabla__submit" type="submit" value="Eliminar"></td>
    
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>45</td>
                    <td>$500</td>
                    <td><input class="tabla__boton" type="submit" value="Editar">  <input class="tabla__submit" type="submit" value="Eliminar"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>45</td>
                    <td>$500</td>
                    <td><input class="tabla__boton" type="submit" value="Editar">  <input class="tabla__submit" type="submit" value="Eliminar"></td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
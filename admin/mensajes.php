<?php
    // Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    $mensaje = true;
    include '../includes/templates/header.php';
?>
    
    <main class="contenedor">
        <div clase="admin__mensaje">
            <div class ="cuadros">
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p>Nombre</p>
                    <p>Correo</p>
                    <p>Mensaje</p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div><!-- cuadro -->
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p><?php echo $row['nombre']; ?></p>
                    <p><?php echo $row['email']; ?></p>
                    <p><?php echo $row['id_mensaje']; ?></p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p><?php echo $row['nombre']; ?></p>
                    <p><?php echo $row['email']; ?></p>
                    <p><?php echo $row['id_mensaje']; ?></p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            
                <div class="cuadro">
                    <h3 class="cuadro__titulo"></h3>
                    <p><?php echo $row['nombre']; ?></p>
                    <p><?php echo $row['email']; ?></p>
                    <p><?php echo $row['id_mensaje']; ?></p>
                    <input class="formulario__submit" type="submit" value="Eliminar">
                </div>
            </div>
        </div>
    </main>
</body>
</html>
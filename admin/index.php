<?php
    //Base de datos 
    require '../includes/config/database.php';
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

    $inicio = true;
    include '../includes/templates/header.php';
?>
    
    <main class="contenedor">
        <div class ="cuadros">
            <div class="cuadro">
                <h3 class="cuadro__titulo">Últimos registros</h3>
                <?php while($row = mysqli_fetch_assoc($resultadoUltimosRegistros) ) : ?>
                    <p><?php echo $row['id_venta']; ?></p>
                <?php endwhile; ?> 
            </div><!-- cuadro -->
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Ingresos</h3>
                <p><?php echo $totalIngresos; ?></p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con más cantidad</h3>
                <p><?php echo $productoMayorCantidad; ?></p>
                <p><?php echo $maxCantidad; ?></p>
            </div>
        
            <div class="cuadro">
                <h3 class="cuadro__titulo">Productos con menos cantidad</h3>
                <p><?php echo $productoMenorCantidad; ?></p>
                <p><?php echo $minCantidad; ?></p>
            </div>
        </div>
    </main>

</body>
</html>
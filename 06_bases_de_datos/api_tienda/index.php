<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('./api_util/conexion.php');
    ?>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de productos</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $entrada = json_decode(file_get_contents("php://input"),true);
                $id_producto = $_POST["id_producto"];
                //echo "<h1>$id_producto</h1>";
                $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql);
            }

            /* $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql); */
            function manejarGet($_conexion){
                //echo json_encode(["método" => "get"]);
                $sql = "SELECT * FROM productos";
                $stmt = $_conexion -> prepare($sql);
                $stmt -> execute();
                $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultado);
            }
            
            manejarGet($_conexion);
        ?>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                        $ruta_imagen = str_replace("..",".", $fila["imagen"]);
                        ?>
                        <td>
                            <img width="50" heigth="80" src="<?php echo $ruta_imagen ?>">
                        </td>
                        <?php
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <h3>Inicia sesión o regístrate para interactuar con los productos</h3>
        <a class="btn btn-primary" href="./usuario/iniciar_sesion.php">Iniciar sesión</a>
        <a class="btn btn-info" href="./usuario/registro.php">Registarse</a><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
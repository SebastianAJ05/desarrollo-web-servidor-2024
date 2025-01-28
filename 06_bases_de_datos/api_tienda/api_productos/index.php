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
        
        require('../util/conexion.php');

        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
    <h2>Bienvenid@ <?php echo $_SESSION["usuario"]?></h2>
    <a class="btn btn-danger" href="../usuario/cerrar_sesion.php">Cerrar sesión</a>
        <h1>Lista de productos</h1>
        <?php
        
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $entrada = json_decode(file_get_contents("php://input"),true);
                $id_producto = $_POST["id_producto"];
                //echo "<h1>$id_producto</h1>";
                /* $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql); */

               /*  # 1 Preparación (Definimos la estructura de la sentencia)
                $sql = $_conexion -> prepare("DELETE FROM productos WHERE id_producto = ?");

                # 2. Enlazadado (Vinculamos las interrogaciones con variables y tipos)
                $sql -> bind_param("i",$id_producto);

                # 3. Ejecución
                $sql -> execute(); */


                function manejarDelete($_conexion, $entrada){
                    echo json_encode(["método" => "delete"]);
                    $sql = "DELETE FROM productos WHERE nombre = :nombre";
                    $stmt = $_conexion -> prepare($sql);
                    $stmt -> execute([
                        "nombre" => $entrada["nombre"]
                    ]);
                    if ($stmt) {
                        echo json_encode(["mensaje" => "el producto se ha borrado"]);
                    }else{
                        echo json_encode(["mensaje" => "error al crear el producto"]);
                    }
                }
                
                manejarDelete($_conexion, $entrada);
            }

            /* $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
 */
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
        <a class="btn btn-secondary" href="nuevo_producto.php">Nuevo producto</a><br><br>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th></th>
                    <th></th>
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
                        ?>
                        <td>
                            <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <?php
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        ?>
                        <td>
                            <a class="btn btn-primary" 
                               href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <h3>¿Olvidaste tu contraseña?</h3>
        <a href="../usuario/cambiar_credenciales.php?usuario=<?php echo $_SESSION["usuario"]?>" class="btn btn-warning">Cambiar contraseña</a>
        <br><br>
        <h3>Aquí puedes interactuar con las categorías</h3>
        <a href="../categorias/index.php" class="btn btn-info">Ir a Categorías</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
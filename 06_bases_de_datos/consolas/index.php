<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
        require('conexion_consolas.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Listado de consolas</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_consola = $_POST["id_consola"];
                /* echo "<h1>$id_consola</h1>";
                $sql = "DELETE FROM consolas WHERE id_consola = '$id_consola'";
                $_conexion -> query($sql); */

                # 1 Preparación (Definimos la estructura de la sentencia)
                $sql = $_conexion -> prepare("DELETE FROM consolas WHERE id_consola = ?");

                # 2. Enlazadado (Vinculamos las interrogaciones con variables y tipos)
                $sql -> bind_param("i",$id_anime);

                # 3. Ejecución
                $sql -> execute();
            }
        ?>
</div>    
    <?php 
        $sql = "SELECT * FROM consolas";
        $resultado = $_conexion -> query($sql);
    ?>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Fabricante</th>
                <th>Generacion</th>
                <th>Unidades vendidas</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila = $resultado -> fetch_assoc()) {
                     // ["titulo" => "Frieren","nombre_estudio"="Pierrot"...]

                    echo "<tr>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["fabricante"] . "</td>";
                    echo "<td>" . $fila["generacion"] . "</td>";
                    if ($fila["unidades_vendidas"] === null) {
                        echo "<td>No hay datos</td>";
                    }else{
                        echo "<td>" . $fila["unidades_vendidas"] . "</td>";
                    }
                    ?>
                        <td>
                            <img width="50" height="80" src="<?php echo $fila["imagen"]?>">
                        </td>
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_consola" value="<?php echo $fila["id_consola"]?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                    echo "</tr>";                        
                }
            ?>
        </tbody>
    </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
        require('conexion_consolas.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">

</div>    
    <?php 
        $sql = "SELECT * FROM fabricantes";
        $resultado = $_conexion -> query($sql);
    ?>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Fabricante</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila = $resultado -> fetch_assoc()) {
                     // ["titulo" => "Frieren","nombre_estudio"="Pierrot"...]

                    echo "<tr>";
                    echo "<td>" . $fila["fabricante"] . "</td>";
                    echo "<td>" . $fila["pais"] . "</td>";
                    echo "</tr>";                        
                }
            ?>
        </tbody>
    </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
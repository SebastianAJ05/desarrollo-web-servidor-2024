<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>
<body>
    <table>
        <thead>
            
        </thead>
        <tbody>
    <?php 
    
        for ($i=1; $i <= 10; $i++) { 
            echo "<th>Tabla del $i:</th>";
            echo "<tr> ";
            for ($j=1; $j <= 10; $j++) {
                echo "<td> $i x $j = " . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
    
    
    ?>
        </tbody>
    </table>
</body>
</html>
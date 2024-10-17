<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./estilos.css" rel="stylesheet" type="text/css">
    <title>Arrays</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
    <?php 
    $frutas = array(
        'clave1' => "Manzana",
        'clave 2'=> "Naranja",
        'clave 3' => "Cereza"

    );
    echo $frutas["clave1"];
    echo "<br>";

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    $frutas1 = [
        "Cereza",
        "Naranja",
        "Manzana"
        
    ];

    $frutas2 = [
        0 => "Manzana",
        1 => "Naranja",
        2 => "Cereza"
    ];
    $frutas3 = [
        1 => "Manzana",
        0 => "Naranja",
        2 => "Cereza"
    ];
    if ($frutas == $frutas2) {
        echo "<h3>Los arrays son iguales</h3>";
    }
    else{
        echo "<h3>Los arrays no son iguales</h3>";
    }

    
    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
    for ($i=0; $i < count($frutas); $i++) {     //3N
        echo "<li>" . $frutas[$i] . "</li>";
    }
    echo "</ol>";
    $i = 0;
    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    while ($i < count($frutas)) {               //3N
        echo "<li>" . $frutas[$i] . "</li>";
        $i++;
    }
    echo "</ol>";
    echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach($frutas as $clave => $fruta){
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    $frutas = array_values($frutas);

    unset($frutas[1]);

    print_r($frutas);

    //echo $frutas[1];
    
    echo "<br>";
    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DOND LA CLAVE 
        SEA EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MÍNIMO 3 PERSONAS

        MOSTRAS EL ARRAY COMPLETO CON PRINT_R Y ALGUNA
        PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGÚN ELEMENTO

        PROBAR A RESETEAR LAS CLAVES
    */

    $personas = [
        "12345678A" => "Sergio Martínez",
        "12345678B" => "Alberto García",
        "87654321A" => "Claudia Jiménez",
        "87654321" => "Amanda Rodríguez"
    ];
    print_r($personas);
    echo "<p>" . $personas["12345678A"] . "</p>";
    

    unset($personas["87654321A"]);
    $personas["94367285J"] = "Marta Moreno";
    array_push($personas, "euidghswduihg");
    $personas["99999999B"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'");
    print_r($personas);
    echo "<br>";
    unset($personas["87654323"]);
    print_r($personas);

    $tamano = count($personas);
    echo "<h3>$tamano </h3>";

    //Recorriendo con un foreach las personas con DNI y Nombre
    echo "<ul>";
    foreach ($personas as $DNI => $nombre) {
        echo "<li>DNI: " . $DNI . " Nombre: " . $nombre . "</li>";
        
    }
    echo "</ul>";

    echo "<table> <thead> <th>DNI</th> <th>Nombre</th> <thead>"
    ?>
    <table>
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            <tr>
                <td>22112233</td>
                <td>Pepe Pérez</td>
            </tr>
            <tr>
                <td>11223344</td>
                <td>María Pérez</td>
            </tr>
        </tbody>
    </table>




    <table>
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
        </thead>
        <tbody>
        <?php 
        
        $personas = [
            "12345678A" => "Sergio Martínez",
            "12345678B" => "Alberto García",
            "87654321A" => "Claudia Jiménez",
            "87654321" => "Amanda Rodríguez"
        ];
        
    
        unset($personas["87654321A"]);
        $personas["94367285J"] = "Marta Moreno";
        array_push($personas, "euidghswduihg");
        $personas["99999999B"] = "Cristiano 'El bicho' Ronaldo";
        array_push($personas, "Messi 'La pulga'");
        unset($personas["87654323"]);
        foreach ($personas as $DNI => $nombre) {
            echo "<tr><td>$DNI</td> <td>$nombre</td></tr>";
        }
        echo "<br><br><br>";
        ?>
        </tbody>
        </table>
        <table>
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
        </thead>
        <tbody>
    <?php
        
        foreach ($personas as $DNI => $nombre) { ?>
            <tr>
                <td><?php echo $DNI ?></td>
                <td><?php echo $nombre ?> </td>
            </tr>
            <?php }
        
        ?>
        </tbody>
    </table>
        <!--Mostrar en una tabla las asiganturas y sus respectivos
        profesores
        Luego:
        MOstrar una tabla adicional ordenada por la asignatura en
        orden alfabético
        Mostrar una tabla adicional ordenada por los profesores en orden
        alfabético inverso-->
        <?php
            $MEDAC = [
                "Desarrollo web entorno servidor" => "Alejandra",
                "Desarrollo web entorno cliente" => "Jaime",
                "Diseño de interfaces" => "José Miguel",
                "Despliegue" => "Alejandro",
                "Empresa e iniciativa emprendedora" => "Gloria",
                "Inglés" => "Virgina"
            ];
        ?>
        <table>
            <thead>
                <th>Asignatura</th>
                <th>Profesor</th>
            </thead>
            <tbody>

        <?php 
        //Normal
            foreach ($MEDAC as $asignatura => $profesor) {
                echo "<tr>";
                echo "<td>$asignatura</td> <td>$profesor</td>";
                echo "</tr>";
            }
        
        
        
        ?>

            </tbody>
        </table>
        <!--____________________________________________ -->
        <table>
            <thead>
                <th>Asignatura</th>
                <th>Profesor</th>
            </thead>
            <tbody>

        <?php 
        //Por orden alfabético de asignaturas
            ksort($MEDAC);
            foreach ($MEDAC as $asignatura => $profesor) {
                echo "<tr>";
                echo "<td>$asignatura</td> <td>$profesor</td>";
                echo "</tr>";
            }
        
        
        
        ?>

            </tbody>
        </table>
        <!--____________________________________________ -->
        <table>
            <thead>
                <th>Asignatura</th>
                <th>Profesor</th>
            </thead>
            <tbody>

        <?php 
        //Por orden alfabético de profesores
            arsort($MEDAC);
            foreach ($MEDAC as $asignatura => $profesor) {
                echo "<tr>";
                echo "<td>$asignatura</td> <td>$profesor</td>";
                echo "</tr>";
            }
        
        
        
        ?>

            </tbody>
        </table>

        <!-- 
            Guillermo => 3  SUSPENSO
            Daiana => 5     APROBADO   
            Ángel => 8      APROBADO
            Ayoub => 7      APROBADO
            Mateo => 9      APROBADO
            Joaquín => 4    SUSPENSO
        -->
        <table>
            <thead>
                <th>Alumno</th>
                <th>Nota</th>
            </thead>
            <tbody>
        <?php 
            $alumnos = [
                "Guillermo" => 3,
                "Daiana" => 5,       
                "Ángel" => 8,   
                "Ayoub" => 7,     
                "Mateo" => 9,     
                "Joaquín" => 4
            ];
            foreach ($alumnos as $nombre => $nota) {
                echo "<tr>";
                if($nota >= 5){
                    echo "<td>" . $nombre . "</td><td>$nota (está aprobado)</td>";
                }else{
                    echo "<td>" . $nombre . "</td><td>$nota (está suspenso)</td>";
                }
                echo "</tr>";
            }
                
        ?>
        </tbody>
    </table>

        <!-- 
            DESPUÉS
            SI NOTA < 5 > SUSPENSO
            SI NOTA < 7 > Aprobado
            SI NOTA < 9 > NOTABLE
            SI NOTA <= 10 > SOBRESALIENTE

            ¡y además! si EL ALUMNO HA APROBADO, QUE SU FILA ESTÉ VERDE
            SI EL ALUMNO HA SUSPENDIDO, QUE SU FILA ESTÉ ROJA
        -->

        <table>
            <thead>
                <th>Alumno</th>
                <th>Nota</th>
            </thead>
            <tbody>
        <?php 
        foreach ($alumnos as $nombre => $nota) {
            echo "<tr>";
            echo "<td>" . $nombre . "</td>";
            if($nota < 5){
                echo "<td class='suspenso'>$nota (está suspenso)</td>";
            }elseif($nota < 7){
                echo "<td class='aprobado'>$nota (está aprobado)</td>";
            }elseif($nota < 9){
                echo "<td class='aprobado'>$nota (tiene notable)</td>";
            }elseif($nota <= 10){
                echo "<td class='aprobado'>$nota (tiene sobresaliente)</td>";
            }else {
                echo "<td>Error</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
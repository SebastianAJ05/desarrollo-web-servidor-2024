<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
    <?php include("../detector_errores.php"); ?>
</head>
<body>
    <?php
    $notas = [
        ["Paco","Desarrollo web servidor"],
        ["Paco","Desarrollo web cliente"],
        ["Manu","Desarrollo web servidor"],
        ["Manu","Desarrollo web cliente"],
        ];    
    /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * 
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida
     * aleatoriamente entre 1 y 10
     * 
     * Ejercicio 4: Añadir una cuarta columnna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego por
     * nota. Si hay varias filas con el mismo nombre y la misma nota,
     * ordenar por la asignatura alfabéticamente
     * 
     * Ejercicio 6: Mostrarlo todo en una tabla
     */

    //Ej 1
    array_push($notas, ["Carlos", "Desarrollo web servidor"]);
    array_push($notas, ["Carlos", "Desarrollo web cliente"]);
    array_push($notas, ["Ayoub", "Desarrollo web servidor"]);
    array_push($notas, ["Ayoub", "Desarrollo web cliente"]);

    //Ej 2
    unset($notas[1]);

    sort($notas);
    //Ej 3 y 4
    for ($i=0; $i < count($notas); $i++) { 
        $notas[$i][2] = rand(1,10);
        if ($notas[$i][2] < 5) {
            $notas[$i][3] = "NO APTO";
        }elseif($notas[$i][2] >= 5){
            $notas[$i][3] = "APTO";
        }
        
    }

    //Ej 5
    $_alumnos = array_column($notas,0);
    $_nota = array_column($notas,2);
    $_asignatura = array_column($notas, 1);
    array_multisort($_alumnos, SORT_ASC, $_nota, SORT_ASC, $_asignatura, SORT_ASC, $notas);

    ?>
    <table>
        <thead>
            <th>Alumno</th>
            <th>Asignatura</th>
            <th>Calificación</th>
            <th>¿Apto?</th>
        </thead>
        <tbody>
    <?php
    //Ej 6

    foreach($notas as $nota){
        list($alumno, $asignatura, $calificacion, $apto) = $nota; ?>
        <tr>
            <td><?php echo $alumno?></td>
            <td><?php echo $asignatura?></td>
            <td><?php echo $calificacion?></td>
            <td><?php echo $apto?></td>
        </tr>
        <?php
        }
?>
        </tbody>
    </table>
    
</body>
</html>
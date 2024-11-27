<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../detector_errores.php");
    require("../05_funciones/edades.php");
    require("../05_funciones/potencias.php"); ?>
    
</head>
<body>
    <h1>Formulario Edad</h1>
    <form action="" method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label>Edad: </label>
        <input type="text" name="edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edad">
        <input type="submit" value="Comprobar">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        //Comprobar que se han introducido los dos campos, si no
        //mostrar por pantalla algún error
        //Resolver el ejercicio en caso de que hayan introducido

        comprobarEdad($nombre, $edad);
    }


    ?>
    <h1>Formulario Potencias</h1>
    <form action="" method="post">
        <label>Base: </label>
        <input type="text" name="base"><br><br>
        <label>Exponente: </label>
        <input type="text" name="exponente"><br><br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <input type="submit" value="Calcular">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        comprobarEdad($base, $exponente);
    }
    

    
    
    
    
    ?>
</body>
</html>
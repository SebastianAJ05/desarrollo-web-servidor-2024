<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../detector_errores.php"); 
    require("../05_funciones/funciones.php");?>
</head>
<body>
    <h1>IVA</h1>
    <?php
    /**
     * Crear en esta página formularios y funciones para los ejercicios:
     * 
     * - iva
     * - irpf
     * - primosRango
     * - temperaturas
     */
    ?>
    <!-- IVA -->
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducdio</option>
        </select><br><br>
        <input type="hidden" name="formulario" value="iva">
        <input type="submit" value="Calcular PVP">
        <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["formulario"] == "iva"){
            $precio = $_POST["precio"];
            $iva = $_POST["iva"];
    
            calcular_IVA($precio, $iva);
        }
        
    }
        
    ?>

    <h1>IRPF</h1>
    <!-- IRPF -->
    <form action="" method="post">
        <input type="text" name="salario" placeholder="Salario">
        <input type="hidden" name="formulario" value="irpf">
        <input type="submit" value="Calcular salario bruto">
        <br><br>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["formulario"] == "irpf"){
            $tmp_salario = $_POST["salario"];
            if ($tmp_salario == '') {
                echo "<p>Introduce el salario.</p>";
            }else{
                if (!is_numeric($tmp_salario)){
                    echo "<p>Tienes que introducir un número</p>";
                }else{
                    if ($tmp_salario < 10000) {
                        echo "<p>Es imposible que éste sea tu salario anual</p>";
                    }else{
                        $salario = $tmp_salario;
                        calcular_IRPF($salario);
                    }
                }
            }  
        }
    }
    ?>


    <!-- Primos Rango -->
    <h1>Primos Rango</h1>
    <form action="" method="post">
        <label>Número 1: </label>
        <input type="Number" name="numero1">
        <br><br>
        <label>Número 2: </label>
        <input type="Number" name="numero2">
        <input type="hidden" name="formulario" value="rango_primos">
        <input type="submit" value="Comprobar">
        <br><br>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["formulario"] == "rango_primos"){
                $num1 = $_POST["numero1"];
                $num2 = $_POST["numero2"]; 

                rangoPrimo($num1, $num2);
            }
            
        }
    ?>



    <h1>Temperaturas</h1>
     <!-- Temperaturas -->

     <form action="" method="post">
        <label>Cantidad de grados a convertir: </label>
        <input type="text" name="c_grados">
        <br><br><label>De grados </label>
        <select name="grados_usu" id="grados_usu">
            <option value="CELSIUS">CELSIUS</option>
            <option value="KELVIN">KELVIN</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
        </select><label> a grados </label>
        <select name="grados_conv" id="grados_conv">
            <option value="CELSIUS">CELSIUS</option>
            <option value="KELVIN">KELVIN</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
        </select>
        <input type="hidden" name="formulario" value="temperaturas">
        <input type="submit" value="Convertir">
        <br><br>
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["formulario"] == "temperaturas"){
            $grados = (int)$_POST["c_grados"];
            
            $grados_usu = $_POST["grados_usu"];
            $grados_conv = $_POST["grados_conv"];



            temperaturas($grados, $grados_usu, $grados_conv);
        }
    }
    ?>
</body>
</html>
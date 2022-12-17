<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <link rel="StyleSheet" type="text/css" href="estilos.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">BUSCAR VALORES</a></li>
            <li><a href="insertar_registro.php">INSERTAR VALORES</a></li>
            <li><a href="eliminar_registro.php">ELIMINAR VALORES</a></li>
            <li><a href="actualizar_registro.php">ACTUALIZAR VALORES</a></li>
        </ul>
    </nav>
    <br>
    <br>
    <?php
        require("comprobar_login.php");
        require("conexion.php");

        if(isset($_POST["boton"])){

            $codigo=$_POST["c_art"];
            $articulo=$_POST["n_art"];
            $seccion=$_POST["seccion"];
            $precio=$_POST["precio"];
            $pais=$_POST["pais"];

            $query = "UPDATE `productos` SET `CODIGOARTICULO`=?,`SECCION`=?,`NOMBREARTICULO`=?,`PRECIO`=?,`PAISDEORIGEN`=? WHERE `CODIGOARTICULO`=?";
        
            $resultado=$conexion->prepare($query);
            $resultado->bind_param("ssssss", $codigo, $seccion, $articulo, $precio, $pais, $codigo);
            $resultado->execute();

            echo "<p><h1>Registro actualizado con éxito</h1></p>";
                echo "<p>$codigo</p>";
                echo "<p>$articulo</p>";
                echo "<p>$seccion</p>";
                echo "<p>$precio</p>";
                echo "<p>$pais</p>";

          
            

        }
    ?>
</body>
</html>
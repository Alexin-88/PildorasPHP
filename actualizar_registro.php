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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formulario">
        <label>Introduce nombre articulo a buscar: <input type="text" name="buscador"></label>
        <input type="submit" name="boton"></button>
    </form>
    <br>
    <br>
    <?php
        require("comprobar_login.php");
        require("conexion.php");

        if(isset($_POST["boton"])){

            $dato=$_POST["buscador"];

            $query = "select CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, PAISDEORIGEN from productos where nombrearticulo =?";
            $resultado=$conexion->prepare($query);
            $resultado->bind_param("s", $dato);
            $resultado->execute();
            $resultado->bind_result($codigo, $seccion, $articulo, $precio, $pais);
        
            while($resultado->fetch()){

               
                echo "<form action='actualizar.php' method='post'>";
                echo "<ul><li><label>Código Articulo: </label><input type='text' name='c_art' readonly  value= '" . $codigo . "'></li>";
                echo "<li><label>Articulo: </label><input type='text' name='n_art'  value= '$articulo'></li>";
                echo "<li><label>Sección: </label><input type='text' name='seccion'  value= '$seccion'></li>";
                echo "<li><label>Precio: </label><input type='text' name='precio'  value= '$precio'></li>";
                echo "<li><label>País de origen: </label><input type='text' name='pais'  value= '$pais'></li></ul>";
                
                echo "<input type='submit' name='boton' value='ACTUALIZAR'></button>";
                echo "</form>";
                
            }

        }
    ?>
</body>
</html>
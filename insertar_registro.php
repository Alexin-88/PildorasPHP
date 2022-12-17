<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Registro</title>
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="formulario2">
        <ul>
            <li><label>Código Articulo: </label><input type="text" name="c_art"></li>
            <li><label>Articulo: </label><input type="text" name="n_art"></li>
            <li><label>Sección: </label><input type="text" name="seccion"></li>
            <li><label>Precio: </label><input type="text" name="precio"></li>
            <li><label>País de origen: </label><input type="text" name="pais"></li>
            <li><label>Foto: </label><input type="file" name="imagen" size="20"></li>
        </ul>
        
        <input type="submit" name="boton"></button>
    </form>
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
            $nombreImagen = $_FILES["imagen"]["name"];
            //ruta de la carpeta destino en servidor
            $carpetaDestino = $_SERVER["DOCUMENT_ROOT"] . "/";
            //mover la imagen del directorio temporal al directorio escogido
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpetaDestino . $nombreImagen);

            $query = "INSERT INTO `productos`(`CODIGOARTICULO`, `SECCION`, `NOMBREARTICULO`, `PRECIO`, `PAISDEORIGEN`, FOTO ) VALUES (?,?,?,?,?,?)";
        
            $resultado=$conexion->prepare($query);

            $resultado->bind_param("ssssss", $codigo, $seccion, $articulo, $precio, $pais, $nombreImagen);

            $resultado->execute();

            
            echo "<p><h1>Registro insertado con éxito </h1></p>";
                echo "<p>$codigo</p>";
                echo "<p>$articulo</p>";
                echo "<p>$seccion</p>";
                echo "<p>$precio</p>";
                echo "<p>$pais</p>";
                echo "<p><img src='/" . $nombreImagen . "' width='25%'/></p>";
            

           }
     
    ?>
</body>
</html>
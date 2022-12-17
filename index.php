<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <link rel="StyleSheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
        require("comprobar_login.php");
        
    ?>
    <nav>
        <ul>
            <li><a href="index.php">BUSCAR VALORES</a></li>
            <li><a href="insertar_registro.php">INSERTAR VALORES</a></li>
            <li><a href="eliminar_registro.php">ELIMINAR VALORES</a></li>
            <li><a href="actualizar_registro.php">ACTUALIZAR VALORES</a></li>
        </ul>
    </nav>
    <form action="busqueda.php" method="post" id="formulario">
        <label>Buscar: </label>
        <select name="opcion">
            <option>Nombre articulo</option>
            <option>Seccion</option>
            <option>Pais de origen</option>
        </select>
        
        <input type="text" name="buscador">
        <input type="submit" name="boton"></button>
    </form>
   
    
</body>
</html>
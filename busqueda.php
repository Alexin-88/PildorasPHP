<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la búsqueda</title>
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
        include("conexion.php");

        if(isset($_GET["pagina"])){
            $pagina = $_GET["pagina"];
            $opcion = $_GET["opcion"];
            $dato = $_GET["dato"];
        }else{
            $pagina=1;
            $opcion=$conexion->real_escape_string(strtoupper(str_replace(" ","",$_POST["opcion"])));
            $dato="%" . $_POST["buscador"] . "%";
        }
        $numRegistros=5;
        
        $empezarDesde=($pagina-1)*$numRegistros;

        $query = "SELECT CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, PAISDEORIGEN, FOTO FROM productos WHERE $opcion like ?";
    
        $resultado = $conexion->prepare($query);

        $resultado->bind_param('s', $dato);

        $resultado->execute();

        $resultado->bind_result($codigo, $seccion, $nombre, $precio, $pais, $foto);
        global $registrosTotales;
        while($resultado->fetch()){
            $registrosTotales++;
        }
        
        $numeroPaginas=ceil($registrosTotales/$numRegistros);
        
        $resultado->close();
       
        //--------------------------------------paginacion-----------------------------------

        $query = "SELECT CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, PAISDEORIGEN, FOTO FROM productos WHERE $opcion like ? limit $empezarDesde,$numRegistros";
    
        $resultado2 = $conexion->prepare($query);

        if(!$resultado2->bind_param('s', $dato)){

            echo "fallo la vinculación";
        }

        if(!$resultado2->execute()){
            echo "Falló la ejecucion";
        }
        
        $resultado2->bind_result($codigo, $seccion, $nombre, $precio, $pais, $foto);
        
        
            while($resultado2->fetch()){
            
                echo "<table>";
                
                echo "<tr><th>Nombre: </th><td>$nombre</td><td rowspan='4'><img src='/$foto' width='200px'/></td></tr>";
                echo "<tr><th>Sección: </th><td>$seccion</td></tr>";
                echo "<tr><th>Precio: </th><td>$precio</td></tr>";
                echo "<tr><th>País: </th><td>$pais</td></tr>";
                echo "<table>";
            }
            echo "<br>";
            echo "<div>";
        for($i=1; $i<=$numeroPaginas; $i++){
            
            echo "<a class='paginacion' href='?pagina=$i&opcion=$opcion&dato=" . urlencode($dato) . "'>  " . $i . "  </a>";
        }
           echo "</div>"; 
        
    ?>
</body>
</html>
<?php
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="pildoras";

    $conexion=new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($conexion->connect_errno){
        echo "Falló la conexión";
    }
    
   $conexion->set_charset("utf8");
?>
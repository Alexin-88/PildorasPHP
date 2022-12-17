<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="StyleSheet" type="text/css" href="estilos.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <ul>
            <li><label>Usuario</label><input type="text" name="usuario"></li>
            <li><label>Contraseña</label><input type="password" name="pass"></li>
        </ul>
        <input type="submit" name="registro" value="Registrarme">

    </form>
    <?php

        if(isset($_POST["registro"])){
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];

            $passCifrada = password_hash($pass,PASSWORD_DEFAULT);

            require("conexion.php");
            $query = "INSERT INTO USUARIOS(NOMBRE, PASS) VALUES ('$usuario', '$passCifrada')";
            $conexion->query($query);
            

            if($insertar->affected_rows == 1){
                header("Location:login.php");
            }

        }
        
    ?>
</body>
</html>
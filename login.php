<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="StyleSheet" type="text/css" href="estilos.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <ul>
            <li><label>Usuario</label><input type="text" name="usuario"></li>
            <li><label>Contraseña</label><input type="password" name="pass"></li>
            <li><label>Recordarme</label><input type="checkbox" name="recordar"></li>
        </ul>
        <a href="registrarse.php">Registrarse</a>
        <input type="submit" name="login" value="Login">

    </form>
    
    <?php
     
        if(isset($_POST["login"])){

            require("conexion.php");
            $nombre = $_POST["usuario"];
            $pass = $_POST["pass"];
            $query = "SELECT * FROM USUARIOS WHERE NOMBRE = ?";
            $resultado = $conexion->prepare($query);
            $resultado->bind_param('s', $nombre,);
            $resultado->execute();
            $resultado->bind_result($resulNombre, $resulPass);
            $resultado->fetch();

            if($nombre==$resulNombre && password_verify($pass, $resulPass)){
                session_start();
                $_SESSION["login"] = true;
                if(isset($_POST["recordar"])){
                    setcookie("login", $nombre, time()+1800);
                }
                
                header("Location:index.php");
                
            }

        }

    ?>
</body>
</html>
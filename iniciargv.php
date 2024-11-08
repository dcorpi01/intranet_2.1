<?php 

    $alert = '';

    if(!empty($_POST))
    {
       if(empty($_POST['uname']) || empty($_POST['password'])){
            $alert = 'Ingrese usuario y contraseña';
       }else{

            require_once "db.php";

            $user = $_POST['uname'];
            $pass = $_POST['password'];

            $query = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$user' 
            AND password = '$pass'");

            $result = mysqli_num_rows($query);

            if( $result > 0){
                $data = mysqli_fetch_array($query);
                session_start();
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['id'];
                $_SESSION['nombre'] = $data['name'];
                $_SESSION['email'] = $data['user_name'];
                $_SESSION['area'] = $data['area'];
                $_SESSION['rol'] = $data['id_cargo'];

                header('location:bienvenida.php');

            }else{
                $alert = 'El usuario o la clave son incorrectos';
            }
        
       }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <link rel="stylesheet" type="text/css" href="css/iniciargv.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <section id="container">

        <form action="logres1.php" method="POST">
            <h3>SOPORTE MAVEPO</h3>
            <img src="./img/LOGO_MAF20241.png" height="70">

            <input type="text" name="uname" placeholder="Correo Empresarial">
            <input type="password" name="password" placeholder="Contraseña">
            <div class="alert"><?php echo isset($alert)? $alert : '';  ?></div>
            <input type="submit" value="Iniciar Sesión">
        </form>

    </section>
</body>
</html>
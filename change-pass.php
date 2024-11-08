<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pass.css">
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cambiar contraseña | INTRAVERDEN</title>
</head>
<body style="background-image: url(4907198.jpg); font-family: 'Arial', sans serif; font-size: 22px;">
<div class="menu-btn">
    <i class="fa fa-bars"></i>
</div>
<div class="container"> <!--Creamos un div que contenga una clase container para la barra de navegación-->
        <nav class="nav-main">
            <img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand">
            <ul class="nav-menu">
                <li>
                    <a href="inicio_usu.php" style="text-decoration: none; color:green;">Inicio</a>
                </li>
            </ul>
            <ul class="h1_arriba">
                <li>
                <h1 class="h1_arriba" style="font-weight: bold;">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1> <!--Se crea una etiqueta h1 y muestra en código php la sesión del usuario-->
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search" style="color: green;"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
        
        </nav>
</div>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5">

        <div class="card card-body">
                <div class="image_sup">
                </div>
    <form action="change_p.php" method="post" style="text-align: center;">

        <h2>Cambiar Contraseña</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        
        <div class="form-group">
        <label> Contraseña Anterior: </label><br>
        <input type="text" name="op" placeholder="Contraseña Antigua"><br>
        </div>

        <div class="form-group">
        <label> Contraseña Nueva: </label><br>
        <input type="text" name="np" placeholder="Contraseña Nueva" class="form-group"><br>
        </div>
        
        <div class="form-group">
        <label> Confirmar Contraseña Nueva: </label><br>
        <input type="text" name="c_np" placeholder="Confirmar Contraseña Nueva" class="form-group"><br>
        </div>

        <button type="submit" class="bc">Cambiar</button>
        <a href="inicio_usu.php" class="ca" style="background-color: green; color: #fff; margin-left: 350px; text-decoration: none; font-size: 26px;">Inicio</a>
        
    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

        }else{
            header("Location:login.php");
            exit();
        }
?>
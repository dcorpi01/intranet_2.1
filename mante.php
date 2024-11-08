<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<?php 

include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mantenimiento | INTRAVERDEN</title>
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/registro.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-image: url(4907198.jpg);">
    <div class="menu-btn">
        <i class="fa fa-bars"></i>
    </div>

    <div class="container">
        <nav class="nav-main">
            <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">
                <!--<li>
                    <a href="inicio_adm.php">Inicio</a>
                </li>-->
                <li>
                    <a href="admin_index.php">Solicitudes</a> 
                </li>
                <li>
                    <a href="users.php">Usuarios</a>
                </li> 
                <li>
                    <a href="mante_tab.php">Tabla</a>
                </li>
                <li>
                    <a href="comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="logout.php">Cerrar Sesión</a>
                </li>
               
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
            </ul>
            <ul class="h1_arriba">
                <li>
                    <h1 class="h1_arriba"> BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
        <hr>

        <h2>INTRAVERDEN <span class="span1">MANTENIMIENTOS</span></h2>
        <hr>

        <div class="content">
            <h3>Registrar <span class="span2">Mantenimiento</span></h3>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card card-body">
                <div class="image_sup">
                    <img class="image-sup" src="INTRAVERDEN.png">
                </div>
                    <form action="save_mant.php" method="post">
                        <div class="form-group">
                            <input type="text" name="eq" class="form-control" placeholder="ID del Equipo" class="mante" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="mar" class="form-control" placeholder="Marca del equipo" class="mante" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="mant" class="form-control" placeholder="Tipo de Mantenimiento" class="mante" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="date" name="fecha" id="fech1" class="mante" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="userw" class="form-control" placeholder="Usuario" class="mante" autofocus required>
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" id="msg1" cols="50" rows="10" placeholder="Descripción del mantenimiento" class="txt1"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="Enviar" name="save_m" style="font-family:Arial, Helvetica, sans-serif; font-size:12pt;">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <br>
    <br>
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v.0.0.1 - 2022</p>
    </div>
    
</body>
</html>


<?php
}else{
    header("Location: login.php");
    exit();
}

?>
<?php 

session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<?php 
include("db.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/comentarios.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT QUICKSAND-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <title>Papelería | INTRAVERDEN</title>
</head>
<body style="background-image: url(4907198.jpg);">
<div class="menu-btn">
    <i class="fa fa-bars"></i>
</div>
<!--Creamos la barra de navegación del módulo-->
<div class="container">
        <nav class="nav-main">
            <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">
                <li>
                    <a href="inicio_adm.php" class="link">Inicio</a>
                </li>
                <li>
                    <a href="admin_index.php" class="link">Solicitudes</a> 
                </li>
                <li>
                    <a href="mante_tab.php" class="link">Mantenimiento</a>
                </li>
                <li>
                    <a href="users.php" class="link">Usuarios</a>
                </li>
                <li>
                    <a href="logout.php" class="link">Cerrar Sesión</a> 
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
            <ul>
                <!--Validamos la sesión del usuario-administrador y damos mensaje de bienvenida -->
                <li>
                <h1>BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
</div>
<hr>
<div class="content">
    <h2>Pape<span>lería</span></h2>
    <hr>
</div>
<div class="col-md-8">
    <!--Creamos la tabla donde el usuario administrador podrá visualizar los comentarios que hacen los clientes-usuarios-->
    <table class="table table-hover" cellpadding="0" cellspacing="0" style="margin-left: 300px;">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Nombre</th>
                <th>Área</th>
                <th>Pedido</th>
                <th>Fecha de pedido</th>
            </tr>
        </thead>
        <tbody>
            <!--Sentencia SQL para seleccionar y ver los comentarios de la base de datos-->
            <?php 
            $query5 = "SELECT * FROM papeleria ORDER BY id DESC";
            $result5 = mysqli_query($conn, $query5);

            while($row = mysqli_fetch_array($result5)) { ?>

                <div class="form-group">

                <div class="table-content">

                <!--Como siguiente paso guardamos las variables de los datos para mostrarlos en la tabla-->
                <tr>

                <?php $id7 = $row['id']?>
                <?php $name7 = $row['nombre']?>
                <?php $correo = $row['correo']?>
                <?php $pape = $row['papeleria']?>
                <?php $fecha8 = $row['fecha']?>


                <td><?php echo $id7?></td>
                <td><?php echo $name7?></td>
                <td><?php echo $correo?></td>
                <td><?php echo $pape?></td>
                <td><?php echo $fecha8?></td>

                </tr>

                </div>

                </div>
            
            <?php }?>
        </tbody>

    </table>
</div>

<!--CUSTOM JAVASCRIPT-->
<!--Conexión con los archivos JavaScript-->
<script src="/js/main.js"></script>


</body>

</html>

<?php
}else{
    header("Location: login.php");
    exit();
}

?>


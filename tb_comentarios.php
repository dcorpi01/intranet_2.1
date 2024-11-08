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
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/stylerh.css">
    <!--Favicon-->
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <?php include "functions.php"; ?>
    <title>Comentarios | INTRAVERDEN</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Solicitudes de Soporte de Sistemas</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/LOGO_MAF20241.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>
    <br>
    <br>
    <nav>
        <ul>
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
                <li>
                    <a href="adm_index.php">Solicitudes</a>
                </li>
                <li>
                    <a href="tabla_mantadm.php">Mantenimiento</a>
                </li>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
        </ul>
    </nav>
<hr>
<div class="content">
    <h2>Comentarios</h2>
    <hr>
</div>
<div class="col-md-8">
    <!--Creamos la tabla donde el usuario administrador podrá visualizar los comentarios que hacen los clientes-usuarios-->
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Área</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            <!--Sentencia SQL para seleccionar y ver los comentarios de la base de datos-->
            <?php 
            $query5 = "SELECT * FROM contacto";
            $result5 = mysqli_query($conn, $query5);

            while($row = mysqli_fetch_array($result5)) { ?>

                <div class="form-group">

                <div class="table-content">

                <!--Como siguiente paso guardamos las variables de los datos para mostrarlos en la tabla-->
                <tr>

                <?php $id7 = $row['id']?>
                <?php $name7 = $row['nombre']?>
                <?php $mail7 = $row['email']?>
                <?php $phone = $row['phone']?>
                <?php $area7 = $row['area']?>
                <?php $msg7 = $row['mensaje']?>

                <td><?php echo $id7?></td>
                <td><?php echo $name7?></td>
                <td><?php echo $mail7?></td>
                <td><?php echo $phone?></td>
                <td><?php echo $area7?></td>
                <td><?php echo $msg7?></td>

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


<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>
    
</html>

<?php
}else{
    header("Location: iniciargv.php");
    exit();
}

?>


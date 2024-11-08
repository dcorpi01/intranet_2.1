<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 ?>

<?php 
    include("db.php");
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas Mantenimientos | MAVEPO ADMINISTRADOR</title>
    <!--CUSTM CSS-->
    <link rel="stylesheet" href="css/stylerh.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <?php include "functions.php"; ?>
    <!--Botón Ir Arriba-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
</script>
<style type="text/css">
/* BackToTop button css */
#scroll {
    position:fixed;
    right:10px;
    bottom:10px;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff
}
#scroll:hover {
    background-color:#e74c3c;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
</style>

</head>
<body>
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    <header>
		<div class="header">
			
			<h1>Mantenimientos | Administrador</h1>
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
    <div class="container">
    <nav>
        <ul>
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
                <li>
                    <a href="adm_index.php">Solicitudes</a>
                </li>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a>
                </li>
                <li>
                    <a href="tb_comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
        </ul>
    </nav>
    <section id="container">
        <h1>Fechas y Registro de Mantenimiento</h1>
        <a href="reg_mantadm.php" class="btn_new">Registrar Mantenimiento</a>

    <br>
    <br>
    
    <div class="form-group">
		
		
	</div>

    <div class="col-md-8" style="color: black;">

        <table style="width:auto; height:20px;" class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Equipo</th>
                    <th>Marca</th>
                    <th>Tipo de Mantenimiento</th>
                    <th>Fecha a realizar mantenimiento</th>
                    <th class="th1" align="center">Correo Electrónico</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Fecha de Actualización</th>
                </tr>

                    

            </thead>
            <tbody>
                <?php 
                $mant_a = "SELECT * FROM mantenimiento ORDER BY id DESC";
                $result_admin = mysqli_query($conn, $mant_a);

                while($row = mysqli_fetch_array($result_admin)) { ?> 

                <div class="form-group">
                    <div class="table-content">
                        <tr>

                            <?php $id9 = $row['id'] ?>
                            <?php $eq = $row['equipo']?>
                            <?php $mark = $row['marca']?>
                            <?php $mant9 = $row['mantenimiento'] ?>
                            <?php $fecha9 = $row['fecha'] ?>
                            <?php $usu9 = $row['usuario'] ?>
                            <?php $msg9 = $row['descripcion']?>
                            <?php $fechac9 = $row['fechac']?>

                            <td style="font-weight: bold;"><?php echo $id9?></td>
                            <td><?php echo $eq?></td>
                            <td style="font-weight: bold;"><?php echo $mark?></td>
                            <td style="color: black;"><?php echo $mant9?></td>
                            <td style="font-weight: bold;"><?php echo $fecha9?></td>
                            <td class="td1" style="font-weight: bold;" ><?php echo $usu9?></td>
                            <td>
                                <form action="update_mant.php" method="post">
                                    <select name="status_fin" class="form-control">
                                        <option value="" selected> </option>
                                        <option value="1" <?php if($row['a_mstatus']==1){echo "selected";} ?>>Asignado</option>
                                        <option value="2" <?php if($row['a_mstatus']==2){echo "selected";} ?>>En Proceso</option>
                                        <option value="3" <?php if($row['a_mstatus']==3){echo "selected";} ?>>Realizado</option>
                                    </select>
                                    <input type="radio" style="display:none;" id="id_fin" name="id_fin" value="<?php echo $id9; ?>" checked hidden>
                                    <div class="col-sm-6">
                                        <input type="submit" name="guardar" class="btn_new" style="margin: auto;" value="Guardar">
                                    </div>
                                </form>
                            </td>
                            <td style="color: black;"><?php echo $msg9?></td>
                            <td style="color: black;"><?php echo $fechac9?></td>
                        </tr>
                    </div>
                </div>
                <?php }?>
            </tbody>
        </table>
        
    </div>
    <!--CUSTOM JAVASCRIPT-->
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
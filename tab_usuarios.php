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
    <!--CUSTOM CSS-->
    <?php include "functions.php"; ?>
    <link rel="stylesheet" href="css/stylerh.css">
    <title>Lista de Usuarios | MAVEPO</title>
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
			
			<h1>Lista de Usuarios | ADMINISTRADOR</h1>
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
        <nav class="navi-main">
    
            <ul class="navi-menu">
               <li>
                    <a href="bienvenida.php" class="link">Inicio</a>
                </li>   
                <li>
                    <a href="adm_index.php" class="link">Solicitudes</a> 
                </li>  
               <li>
                    <a href="tabla_mantadm.php" class="link">Mantenimiento</a>
                </li>
                <li>
                    <a href="tb_pape.php" class="link">Registro Papelería</a>
                </li>
               <li>
                    <a href="tb_comentarios.php" class="link">Comentarios</a>
                </li>
            </ul>
        </nav>
        <section id="container">
        <div class="content">
            <h1>Lista de Usuarios</h1>

            <a href="nuevo_usuario.php" class="btn_new">Registrar Usuario Nuevo</a>
        </div>
        

        <div class="col-md-8">
            <table class="table table-dark table-hover"" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query1 = "SELECT * FROM users";
                    $result_tasks = mysqli_query($conn, $query1);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>

                        <div class="form-group">
                            <div class="table-content">
                                <tr>
                                    <?php $id3 = $row['id'] ?>
                                    <?php $nombre3 = $row['name'] ?>
                                    <?php $email3 = $row['user_name'] ?>
                                    <?php $area3 = $row['area']?>

                                    <td style="font-weight: bold;"><?php echo $id3?></td>
                                    <td style="text-align: left;"><?php echo $nombre3?></td>
                                    <td style="text-align: left; font-weight: bold;"><?php echo $email3?></td>
                                    <td style="text-align: left;"><?php echo $area3?></td>
                                </tr>
                            </div>
                        </div>

                    

                    <?php  }?>
                </tbody>
            </table>
           
    <hr class="hr1">
    <br>
   
    <hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>

 </div>
        
   

        <!--CUSTOM JAVASCRIPT-->
    <script src="/js/main.js"></script>
</body>
</html>



<?php
 }else{
    header("Location: iniciargv.php");
    exit();
 }
   ?>
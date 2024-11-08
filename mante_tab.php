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
    <title>Fechas Mantenimientos | INTRAVERDEN</title>
    <!--CUSTM CSS-->
    <link rel="stylesheet" href="mante_tab.css">
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
<body style="background-image: url(4907198.jpg);">
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    
    <div class="menu-btn">
        <i class="fa fa-bars"></i>
    </div>

    <div class="container">
        <nav class="nav-main">
            <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">    
                <li>
                    <a href="inicio_adm.php">Inicio</a> 
                </li>
                <li>
                    <a href="adm_index.php">Solicitudes</a>
                </li>
                <li>
                    <a href="users.php">Usuarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
                <li>
                    <a href="comentarios.php">Comentarios</a>
                </li>
                 <li>
                    <a href="logout.php">Cerrar Sesión</a> 
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
            <ul class="h1_arriba">
                <li>
                <h1 class="h1_arriba">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
        <hr>
        <h2>INTRAVERDEN <span class="span1">ADMINISTRADOR</span></h2>
        <hr class="hr1">


        <div class="content">
            <h3>Fechas de <span>Mantenimiento</span></h3>
            <hr>
               
        </div>
        
        
    
    <div class="form-group">
		
		
	</div>

        <br>
           <input type="button" value="Registrar Mantenimiento" onclick="location.href='mante.php'" style="color: white; background-color: #038c65; font-size:large;cursor: pointer;"  class="btn-sol">
        <br>

    <div class="col-md-8" style="color: black;">

        <table style="width:auto; height:20px;" class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Equipo</th>
                    <th>Marca</th>
                    <th>Tipo de Mantenimiento</th>
                    <th>Fecha a realizar mantenimiento</th>
                    <th class="th1" align="cener">Correo Electrónico</th>
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

                            <td style="color: black;"><?php echo $id9?></td>
                            <td><?php echo $eq?></td>
                            <td style="color: black;"><?php echo $mark?></td>
                            <td style="color: black;"><?php echo $mant9?></td>
                            <td><?php echo $fecha9?></td>
                            <td class="td1" style="font-size: small; color: black;" ><?php echo $usu9?></td>
                            <td>
                                <form action="update_mant.php" method="post">
                                    <select name="status_fin" class="form-control">
                                        <option value="" selected> </option>
                                        <option value="1" <?php if($row['a_mstatus']==1){echo "selected";} ?>>Asignado</option>
                                        <option value="2" <?php if($row['a_mstatus']==2){echo "selected";} ?>>En Proceso</option>
                                        <option value="3" <?php if($row['a_mstatus']==3){echo "selected";} ?>>Realizado</option>
                                    </select>
                                    <input type="radio" id="id_fin" name="id_fin" value="<?php echo $id9; ?>" checked hidden>
                                    <div class="col-sm-6">
                                        <input type="submit" name="guardar" class="btn btn-sm btn-primary" value="Guardar">
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
</html>

<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>
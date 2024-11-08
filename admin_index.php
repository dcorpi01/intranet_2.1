<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 ?>

 <?php 
    include("db.php");
 ?>
<!--CREAMOS LA SESIÓN CON LOS DATOS DEL USUARIO-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/admin_index.css">
    <title>Administración | INTRAVERDEN</title>
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
    <!--CREAMOS LA BARRA DE NAVEGACIÓN DE NUESTRO MÓDULO-->
    <div class="container">
        <nav class="nav-main">
            <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">    
                <li>
                    <a href="inicio_adm.php">Inicio</a> 
                </li>
                <li>
                    <a href="mante_tab.php">Mantenimiento</a>
                </li>
                <li>
                    <a href="users.php">Usuarios</a>
                </li>
                <li>
                    <a href="comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
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
            <!--MENSAJE DE BIENVENIDA Y SESIÓN DEL USUARIO-->
            <ul class="h1_arriba">
                <li>
                <h1 class="h1_arriba">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
        <hr>

        <!--PRESENTACIÓN DE LA VALIDACIÓN DEL CARGO QUE TIENE CADA USUARIO-->

        <h2>INTRAVERDEN <span class="span1">ADMINISTRADOR</span></h2>
        <hr class="hr1">


        <div class="content">
            <h3>Solici<span>tudes</span></h3>
            <hr>
               
        </div>
        
        
    
    <div class="form-group">
		
		
	</div>


<div class="col-md-8">
    
    <!--CREACIÓN DE LA TABLA PARA QUE EL USUARIO-ADMINISTRADOR VISUALICE LAS SOLICITUDES DE LOS USUARIOS-CLIENTES-->
    <table style="width:auto; height:20px;" class="table table-bordered" cellpadding="0" cellspacing="0"> <!-- creacion de la tabla -->
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Nivel</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Estado de Usuario</th>
                <th>Fecha Actualización</th>
                <th>Fecha Usuario</th>
            </tr>
        </thead>
        <tbody>
            <!--Creamos la sentencia SLQ para poder visualizar la información de la tabla solicitud de nuestra base de datos en nuestro proyecto-->
            <?php
            $query = "SELECT * FROM solicitud ORDER BY id DESC";
            $result_tasks = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result_tasks)) { ?>

                <div class="form group">
                
                <div class="table-content">
                <tr>
                    <?php $id1=$row['id'] ?>
                    <?php $nombre1=$row['nombre'] ?>
                    <?php $area1 = $row['area'] ?>
                    <?php $tipo1 = $row['tipo']?>
                    <?php $nivel1 = $row['nivel']?>
                    <?php $fecha1 = $row['fecha']?>
                    <?php $desc1 = $row['descripcion']?>
                    <?php $fechaac = $row['fechaac']?>
                    <?php $fechaacu = $row['fechaacu']?>
                    
                    <td style="color: black;"><?php echo $id1?></td>
                    <td><?php echo $nombre1?></td>
                    <td><?php echo $area1?></td>
                    <td><?php echo $tipo1?></td>
                    <td><?php echo $nivel1?></td>
                    <td><?php echo $fecha1?></td>
                    <td><?php echo $desc1?></td>
                    <td>
                    <form action="update.php" method="POST">
                        <select name="status_final" class="form-control">
                            <option value="1" <?php if ($row ['d_status']==1){echo "selected";} ?>>Abierto</option>
                            <option value="2" <?php if ($row ['d_status']==2){echo "selected";} ?>>Cerrado</option>
                            <option value="3" <?php if ($row ['d_status']==3){echo "selected";} ?>>En Proceso</option>
                            <option value="4" <?php if ($row ['d_status']==4){echo "selected";} ?>>No Aplica</option>
                        </select>
                        <input type="radio" id="id_final" name="id_final" value="<?php echo $id1; ?>" checked hidden>
                        
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="save">
                        </div>
                    </form>
                    </td>
                    <td>
                        
                    
                    <?php 
                    
                    switch ($row['u_status']){
                        case 1:
                            echo "Abierto";
                            break;
                        case 2:
                            echo "Cerrado";
                            break;
                    }
                    ?>
                <!--Mostramos los datos que se nos solicitan de los usuarios-clientes-->
                
                    </td>
                    <td><?php echo $fechaac?></td>
                    <td><?php echo $fechaacu?></td>
                </tr>
                </div>
                
                </div>
           <?php }?>
        </tbody>
    </table>
    </form>

    <!--<script src="js/s_a.js"></script>-->
    <!--CUSTOM JAVASCRIPT-->
    <script src="/js/main.js"></script>
        </body>

<footer>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p>Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v.0.0.3 - 2022</p>
    </div>
</footer>

</html>

<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>
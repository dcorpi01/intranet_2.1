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
    <link rel="stylesheet" href="css/users.css">
    <title>Lista de Usuarios | INTRAVERDEN</title>
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
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

    <div class="container-o">
        <nav class="navi-main">
           <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="navi-brand"></a> 
            <ul class="navi-menu">
               <li>
                    <a href="inicio_adm.php" class="link">Inicio</a>
                </li>   
                <li>
                    <a href="adm_index.php" class="link">Solicitudes</a> 
                </li>  
               <li>
                    <a href="mante_tab.php" class="link">Mantenimiento</a>
                </li>
                <li>
                    <a href="tb_pape.php" class="link">Registro Papelería</a>
                </li>
               <li>
                    <a href="comentarios.php" class="link">Comentarios</a>
                </li>
                 <li>
                    <a href="logout.php" class="link">Cerrar Sesión</a> 
                </li>
            </ul>
            <ul class="navi-menu-right">
            </ul>
            <ul class="h1_arriba">
                <li>
                <h1 class="h1_arriba">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
        <hr>

        <h2 class="admini">INTRAVERDEN <span class="span1">ADMINISTRADOR</span></h2>
        <hr class="hr1">


        <div class="content">
            <h3>Usua<span class="span2">rios</span></h3>
            <hr>
        </div>
        <br>
            <input type="button" value="Registrar Usuario" onclick="location.href='registro.php'" style="color: white; background-color: #038c65; font-size:large;"  class="btn-sol">
        <br>

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

                                    <td><?php echo $id3?></td>
                                    <td style="text-align: left;"><?php echo $nombre3?></td>
                                    <td style="text-align: left;"><?php echo $email3?></td>
                                    <td style="text-align: left;"><?php echo $area3?></td>
                                </tr>
                            </div>
                        </div>

                    

                    <?php  }?>
                </tbody>
            </table>
           
    <hr class="hr1">
    <br>
   
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v.0.0.1 - 2022</p>
    </div>
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
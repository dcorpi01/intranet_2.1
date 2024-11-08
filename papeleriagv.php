<?php
    session_start();

    if($_SESSION['id_cargo'] != 3 && $_SESSION['id_cargo'] != 1){
        header("location: ./bienvenida.php");
    }

    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
        $mail=$_SESSION['user_name'];
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
        <link rel="stylesheet" type="text/css" href="css/resimex.css">
        <title>Solicitud de Papelería | INTRAVERDEN</title>
        <link rel="icon" href="img/LOGO_VERDEN_H.png">
        <?php include "functions.php"; ?>
    </head>
    <body>
    <header>
		<div class="header">
			
			<h1>INTRAVERDEN | COMPRAS</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="img/LOGO_VERDEN_H.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>
    <br>
    <br>
    <nav>
    <ul>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="bienvenida.php">Inicio</a> 
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li class="principal">
				    <a href="#">Sistemas</a>
				        <ul>
						    <li><a href="tabla_mantadm.php">Mantenimientos</a></li>
                            <li><a href="tab_usuarios.php">Usuarios</a></li>
                            <li><a href="tb_comentarios.php">Comentarios</a></li>
                            <li><a href="tb_pape.php">Registro Papelería</a></li>
					    </ul>
                                                   
			    </li>
                <?php }?>
                 
                 <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li>
                    <a href="bienvenida.php">Inicio</a> 
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="index_rh.php">Recursos Humanos</a>
                </li>
                <?php }?>
                <?php 
                    if($_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 1){
                ?>
                <li>
                    <a href="index_mtto.php">Mantenimiento Gral.</a>
                </li>
                <?php }?>

                <?php 
                    if($_SESSION['id_cargo'] == 5){
                ?>
                <li>
                    <a href="tb_pape.php">Registro papeleria</a>
                </li>
                <?php }?>
                
        </ul>
    </nav>

    <div>
        <section id="container">

            <img src="LOGO_RESIMEX.png" class="image-sup">

            <div class="form_register">

                <h1 style="margin-left: 30px;">Solicitud de Papelería</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <form action="#" method="post">
                    <div class="container" style="max-width: 800px;">

                    <div class="text-center" style="margin: 20px 0px 20px 0px;">
                        <span class="text-secondary">Por favor, ingresa tu pedido de papelería, recuerda que tienes hasta el día 15 de cada mes para ingresar tu pedido y que llegue dentro del tiempo establecido.</span>
                    </div>
                    
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Área: </label>
                            <input type="text" name="area" class="form-control" required>
                        </div>
                        <hr>
                        <div class="container2">
                        <div class="form-group">
                            <span style="display: block; font-size: 12pt; font-family: 'GothamBook'; margin: 15px auto 5px auto;">Cantidad: </span>
                            <input type="text" name="cantidad" class="form-control">
                        </div>
                        <div class="form-group">
                            <span style="display: block; font-size: 12pt; font-family: 'GothamBook'; margin: 15px auto 5px auto;">Unidad: </span>
                            <select name="unidad" id="unidad" class="form-control">
                                <option selected>Selecciona la unidad ---</option>
                                <option value="pza">pza</option>
                                <option value="caja">caja</option>
                                <option value="paq">paq</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span style="display: block; font-size: 12pt; font-family: 'GothamBook'; margin: 15px auto 5px auto;">Producto: </span>
                        <?php 
                
                            $query4 = mysqli_query($conn, "SELECT * FROM papebas");
                            $result3 = mysqli_num_rows($query4);
                        
                         ?>

                        <select name="producto" id="producto">
                            <?php 
                    
                            if($result3){
                                while ($prod = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $prod["id"]; ?>"><?php echo $prod["producto"]; ?></option>                
                            <?php
                         }
                        }
                    
                            ?>
                        </select>
                        
                        <input type="button" value="Agregar" id="agregar">

                        <hr>

                        <input type="submit" value="Enviar" class="btn_save">
                        </div>
                        </div>
                    </form>
                    </div>
                </form>

            </div>

        </section>
        </div>

        <script src="js/dom.js"></script>
        <script src="js/agregar.js"></script>
    </body>
    </html>


<?php
}else{
        header("Location: inicio_usu.php");
        exit();
    }
        ?>
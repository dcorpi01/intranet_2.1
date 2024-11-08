<!--Incluimos los valores de la sesión-->
<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 ?>

 <?php 
    include("db.php"); /*Incluimos la conexión a la base de datos*/
 ?>

<?php include("includes/header.php");?>  <!--Incluimos el archivo header.php-->

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
                <li>
                    <a href="mis_mant.php" style="text-decoration: none; color:green;">Próximos Mantenimientos</a>
                </li>
                <li>
                    <a href="usu_index.php" style="text-decoration: none; color:green;">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="papeleria1.php" style="text-decoration: none; color: green;">Requisición de Papelería</a>
                </li>
                <li>
                    <a href="logout.php" style="text-decoration: none; color:green;">Cerrar Sesión</a> 
                </li>
            </ul>
            <ul class="h1_arriba">
                <li>
                <h1 class="h1_arriba">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1> <!--Se crea una etiqueta h1 y muestra en código php la sesión del usuario-->
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
        
        </nav>
</div>
<h2>Solicitud de Soporte de Sistemas</h2>
<hr>
<!--Se crea el formulario de creación para las solicitudes de soporte técnico-->
<div class="container p-4">

    <div class="row">

        <div class="col-md-5" >

            <div class="card card-body">
                <div class="image_sup">
                    <img class="image-sup" src="INTRAVERDEN.png">
                    <br>
                    <img class="image-sup" src="LOGO_RESIMEX.png">
                </div>
                <!--El formulario obtiene los datos a través de el archivo php y el método POST-->
                <form action="save.php" method="POST">
                    <p style="font-size: 26px; font-weight: bold;">Datos del Solicitante</p>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="area" class="form-control" placeholder="Área o Proceso" autofocus required>
                    </div>
                    <!--Se agregan inuts de tipo radio para que el usuario tenga mayor facilidad para ingresar los datos solicitados-->
                    <div class="form-group">
                        <p style="font-size: 26px; font-weight: bold;">Datos del Servicio</p>
                        <!--<label> Reparación, Instalación, Asesoría.</label>-->
                        <!--<br>-->
                        <label for="">Seleccione el tipo de soporte que requiere.</label>
                        <br>
                        <input type="radio" name="tipo" value="Reparacion"  required> Reparacion
                        <br>
                        <input type="radio" name="tipo" value="Instalacion"  required> Instalación 
                        <br>
                        <input type="radio" name="tipo" value="Asesoria"  required> Asesoría
                        <br>
                        <input type="radio" name="tipo" value="Configuracion" required> Configuración
                        <br>
                        <input type="radio" name="tipo" value="Otro" required> Otro
                    </div>
                    <div class="form-group">
                        
                        <label>Seleccione el nivel de urgencia que considere.</label>
                        <br>
                        <input type="radio" name="nivel" value="Alto"  required> Alto
                        <input type="radio" name="nivel" value="Medio"  required> Medio
                        <input type="radio" name="nivel" value="Bajo" required> Bajo
                        <!--<select name="nivel" id="" required>
                            <option value=" "></option>
                            <option value="Alto">Alto</option>
                            <option value="Medio">Medio</option>
                            <option value="Bajo">Bajo</option>
                        </select>-->
                    </div>
                    <!--Para realizar la descripción de la solicitud, utilizaremos un textarea a que nos permíte moldearla al gusto-->
                    <div class="form-group">
                        <textarea name="description" cols="60" rows="10" placeholder="Descripción del problema o servicio" autofocus required></textarea>
                    </div>
                    <!--Se agrega el botón de enviar, para que los datos que ingresamos sean enviados de manera correcta-->
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Enviar" style="font-size: 16px;">
                    <br>
                    <br>
                    <p style="font-size: 10px; text-align:right;">FR-TI-01, REV.00</p>
                </form>
            </div>

        </div>
    </div>

</div>

<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p>Desarrollado por: David Alberto Corpi Zavala</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v2.0 - 2022</p>
    </div>

    <!--SCRIPTS-->
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>

   
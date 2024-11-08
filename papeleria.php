<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<?php 
    include("db.php");
?>

<?php include("includes/header.php"); ?>

    <div class="menu-btn">
        <i class="fa fa-bars"></i>
    </div>
    <div class="container">
        <nav class="nav-main">
            <img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand">
            <ul class="nav-menu">
                <li>
                    <a href="inicio_usu.php" style="text-decoration: none; color:green;">Inicio</a>
                </li>
                <li>
                    <a href="mante_usr.php" style="text-decoration: none; color:green;">Próximos Mantenimientos</a>
                </li>
                <li>
                    <a href="usu_index.php" style="text-decoration: none; color:green;">Mis Solicitudes</a>
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
    <h2>Requisición de papeleria.</h2>
    <hr>

    <div class="container p-4">
        <div class="row">
        <div class="col-md-5">
            <div class="card card-body">
                <div class="image-sup">
                    <img class="img-sup" src="INTRAVERDEN.png">
                </div>
                <form action="save_pape.php" method="post">
                    <div class="form-group">
                        <label>Nombre: </label>
                        <input type="text" name="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Área: </label>
                        <input type="text" name="area" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Papelería: </label>
                        <textarea name="pape" cols="60" rows="10" placeholder="Papelería solicitada" autofocus required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_pape" value="Enviar Papeleria">
                </form>
            </div>

        </div>
        </div>
    </div>
    <hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v.0.0.1 - 2022</p>
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
}?>
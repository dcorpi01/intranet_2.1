<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/contacto.css">
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/655678ccc7.js" crossorigin="anonymous"></script>
    <!--FONT AWESOME CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <?php include "functions.php"; ?>
    <title>Contacta con nosotros!</title>
</head>

<body>
<header>
<div class="header">
			
			<h1>INTRAVERDEN</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
			</div>
</div>
</header>
<nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li class="principal">
				<a href="login.php">Iniciar sesión</a>
			</li>
				<li class="principal">
                    <a href="informacion.php">Acerca de...</a>
                        
                </li>
        </ul>
    </nav>

    <!--Creamos el formulario donde ingresaremos los comentarios.-->
    <div class="content">
        <h1 class="logo">Contáct<span>anos</span></h1>

        <div class="contact-wrapper">
            <div class="contact-form">
                <h3>Coméntanos</h3>
                <form action="save_c.php" method="post">
                    <p>
                        <label for="fullname">Nombre Completo</label>
                        <input type="text" name="fullname" id="fullname">
                    </p>
                    <p>
                        <label>Correo Electrónico</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label for="phone">Número de Teléfono</label>
                        <input type="tel" name="phone">
                    </p>
                    <p>
                        <label>Área</label>
                        <input type="text" name="area" required>
                    </p>
                    <p>
                        <label>Mensaje</label>
                        <textarea name="msg" rows="3" required></textarea>
                    </p>
                    <p>
                        <button type="submit" name="guardar_c">
                            Enviar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <!--Se crea el apartado de más información y soporte.-->
                <h4>Más Información.</h4>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i>Eje No. 136, #258, Zona Industrial, SLP</li>
                    <li><i class="fa-solid fa-phone"></i> (444) 450 3125</li>
                    <li><i class="fa-solid fa-envelope-open-text"></i> intraverden@grupoverden.com</li>
                </ul>
                <a href="https://grupoverden.com/">
                    <i style="text-decoration: none; color:white;">grupoverden.com</i>
                </a>
            </div>
        </div>

    </div>
    <footer>
        <!--Footer para los datos del desarrollador y versión del sistema-->
        <div class="foot">
            <p> Creado por: David Alberto Corpi Zavala | 2022</p>
            <p>INTRAVERDEN &#169</p>
            <p>Residuos Mexicanos</p>
            <p>v1.2 - 2022</p>
        </div>
    </footer>
</body>

</html>
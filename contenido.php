<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/contenido.css">
    <title>Inicio | INTRAVERDEN</title>
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="LOGO_VERDEN_H.png">
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
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>
<body style="background-image: url(4907198.jpg); font-family: 'Oswald', sans-serif; margin-left: 10px;" >
    
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    
    <div class="menu-btn">
        <i class="fa fa-bars"></i>
    </div>

    <div class="container1">
        <nav class="nav-main" style="color: green;">
            <!--Barra de navegación-->
            <a href="index.html"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">
                <li>
                    <a href="index.html">Inicio</a>
                </li>
                <li>
                    <a href="contacto.php">Contacto</a>
                </li>
                <!--<li>
                    <a href="#">Descargas</a>
                </li>-->
                <li>
                    <a href="informacion.php">Acerca de..</a>
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <hr>
        <!--lOGO PRINCIPAL DE LA INTRAVERDEN-->
        <img src="logo-intraverden.png" alt="Logo INTRAVERDEN" class="img-logo">
        <!--<h2>INTRAVERDEN</h2>-->
        <hr class="hr1">
        <!--SHOWCASE-->
        <!--BANNER PRINCIPAL DE LA PLATAFORMA-->
        <!--<header class="showcase" style="background-image: url(img/banner_grupoVerden.jpg);">
            <h2>Aviso IMPORTANTE</h2>
            <p>Liberación de INTRAVERDEN por parte del proceso de Tecnologías de la Información. v0.0.1-2022</p>
            <a href="#" class="btn-read-more">Read More <i class="fas fa-angle-double-right"></i></a>
        </header>-->
    
        <!--NEWS CARDS-->
        <!--CONTINUACIÓN DE LA PÁGINA, AQUÍ SE VISUALIZARÁN LOS BOLETINES SEMANALES Y MÁS INFORMACIÓN-->
        <!--SE DIVIDEN EN CUADRICULA Y BOTONES-->
        <br>
        <br>
        <div class="news-cards">
            <div>
                <img src="img/boletin 1.png" alt="News 1" title="BOLETIN RME | INTRAVERDEN">
                <h3>Boletín RME</h3>
                <p>Son aquellos generados en los procesos productivos que no reúnen las características para ser considerados como peligrosos.</p>
                <a href="img/boletin 1.png">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="img/boletin 2.png" alt="News 1">
                <h3>Las 3R</h3>
                <p>Las 3R es una regla para cuidar el medio ambiente, específicamente para reducir el volumen de residuos o basura generada.</p>
                <a href="img/boletin 2.png">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="img/boletin 3.png" alt="News 1">
                <h3>Tips para separar la basura</h3>
                <p>Separar la basura conlleva a una enorme catidad de beneficios, pues no solo estarás ayudando al planeta, sino que también puedes contribuir al reciclaje...</p>
                <a href="img/boletin 3.png">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="img/boletin 4.png" alt="News 1">
                <h3>¿Qué daño causa un MAL manejo de residuos?</h3>
                <p>El futuro no es desechable...</p>
                <a href="img/boletin 4.png">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
        <br>
        <br>

        <!--PRIMER BANNER SECUNDARIO-->
        <!--<section class="cards-banner-one" style="background-image: url(tg2.jpg); background-size: cover;">
            <div class="content" style="color: black;">
                <h2 class="h22">Lorem, ipsum dolor.</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio amet doloribus dolore consequatur itaque iusto quasi quia tempora reiciendis inventore.</p>
                <a href="#" class="btn-read-more">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
        </section>-->

        <br>
        <h2 style="font-size: 36;"> Tecnología Verde...</h2>

        <br>
        <br>

        <div class="news-cards">
            <div>
                <img src="cerrar1.png" alt="">
                <h3>Cerrar ticket - INTRAVERDEN.</h3>
                <p>Las nuevas tecnologías al servicio del medio ambiente van de la mano con la transición hacia nuevos modelos de negocio...</p>
                <a href="CERRAR SOLICITUD DE SOPORTE - INTRAVERDEN.mp4">REPRODUCIR VIDEO <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="tecv2.jpg" alt="News 1">
                <h3>El mercado de la Tecnología verde crece sin parar.</h3>
                <p>Energías renovables, recuperación del agua, tecnología basada en el reciclaje, sistemas de propulsión no contaminantes, innovación en nuevos materiales: las opciones de la tecnología verde son infinitas.</p>
                <a href="https://www.ecoticias.com/tecnologia-verde/el-mercado-de-la-tecnologia-verde-crece-sin-parar">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="tecv3.jpg" alt="News 1">
                <h3>Tecnologías verdes para cuidar el medio ambiente.</h3>
                <p>El medio ambiente necesita cuidados intensivos a causa de las atrocidades que el ser humano viene cometiendo desde hace siglos. Las tecnologías verdes pueden convertirse en aliadas indispensables para prevenir, mitigar y corregir estos daños.</p>
                <a href="https://www.ecoticias.com/tecnologia-verde/tecnologias-verdes-para-cuidar-el-medio-ambiente">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div>
                <img src="tecv4.jpg" alt="News 1">
                <h3>El grafeno ¿será el rey de los materiales?</h3>
                <p>En 2004, Geim y Novoselov, dos físicos de la Universidad de Manchester consiguieron extraer de una mina de lápiz, una capa de moléculas de carbono que conformaban un súper material denominado: grafeno.</p>
                <a href="https://www.ecoticias.com/tecnologia-verde/el-grafeno-sera-el-rey-de-los-materiales">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>

        <!--<section class="cards-banner-two" style="background-image: url(tg2.jpg); background-size: cover;">
            <div class="container">
                <h2 class="h23">Lorem, ipsum dolor.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga similique cum dolore distinctio voluptatum impedit officiis quae laboriosam et tenetur, sit minima doloremque quidem alias facere odio porro consequuntur vero culpa dolorem asperiores voluptatem saepe nihil? Dolorem distinctio vel nesciunt.</p>
                <a href="" class="btn-read-more">Leer Más <i class="fas fa-angle-double-right"></i></a>
            </div>
        </section>-->

        <!--AQUÍ SE OBSERVAN LINKS A DIFERENTES SITIOS WEB-->
    </div>
    <!--SCROLL REVEAL-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--CUSTOM JAVASCRIPT-->
    <script src="main.js"></script>
</body>

<br>
<br>


<footer>
    <!--DATOS DEL DESARROLLADOR EN EL PIÉ DE PÁGINA-->
    <div class="foot">
    <p>Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos S.A. de C.V.</p>
    <p>v.0.0.1 - 2022</p>
    </div>
</footer>

</html>
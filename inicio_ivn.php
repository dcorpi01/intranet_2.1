<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Inicio | INTRAVERDEN</title>
    <link rel="icon" href="LOGO_VERDEN_H.png">
    <?php include "functions.php"; ?>
    <script type="text/javascript" src="js/functions.js"></script>
    <!--Botón Ir Arriba-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="slider.js"></script>


    <link rel="stylesheet" type="text/css" href="css/inicio.css">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
   

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
var current = 0;
var imagenes = new Array();
 
$(document).ready(function() {
    var numImages = 6;
    if (numImages <= 3) {
        $('.right-arrow').css('display', 'none');
        $('.left-arrow').css('display', 'none');
    }
 
    $('.left-arrow').on('click',function() {
        if (current > 0) {
            current = current - 1;
        } else {
            current = numImages - 3;
        }
 
        $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
 
        return false;
    });
 
    $('.left-arrow').on('hover', function() {
        $(this).css('opacity','0.5');
    }, function() {
        $(this).css('opacity','1');
    });
 
    $('.right-arrow').on('hover', function() {
        $(this).css('opacity','0.5');
    }, function() {
        $(this).css('opacity','1');
    });
 
    $('.right-arrow').on('click', function() {
        if (numImages > current + 3) {
            current = current+1;
        } else {
            current = 0;
        }
 
        $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
 
        return false;
    }); 
 });
</script>


</head>
<body>
<header style="position: fixed; width: 100%;">
		<div class="header" style="color: #FFF;
	background: #014017;
	height: 35px;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px;">
			
			<h1 style="font-family: 'arial'; font-weight: bold; letter-spacing: 1px; font-size: 26px;">INTRAVERDEN</h1>
			<div class="optionsBar" style="display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
			</div>
		</div>
	</header>

    <br>
    <br>
    <nav>
    <ul style="text-decoration: none;">
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li class="principal">
				<a href="#">Contenido</a>
			</li>
				<li class="principal">
                    <a href="contacto.php">Contacto</a>
                </li>
                <li>
                    <a href="informacion.php">Acerca de...</a>
                </li>
        </ul>
    </nav>
    <hr>
    <!--lOGO PRINCIPAL DE LA INTRAVERDEN-->
    <img src="logo-intraverden.png" alt="Logo INTRAVERDEN" class="img_logo" style="display: block; margin: auto;">
    <hr>

    <div class="container" style="width: 1200px;">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
            </ol>
        
            <!-- Wrapper for slides -->

            

            <div class="carousel-inner">
                <div class="item active">
                    
                    <img src="PAPENOV2022.png" alt="">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>

                <!--<div class="item">
                    <img src="PAPEOCT2022.png" alt="">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>-->
          
               <div class="item" style="margin-left: auto;">
                    <a href="2022 CODIGO DE VESTIMENTA.pdf"><img src="VESTIMENTA.png" alt=""></a>
                    <div class="carousel-caption">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>

                <!--<div class="item">
                    <img src="junio122.png" alt="">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p></p>
                    </div>
                </div>
                
                <div class="item">
                    <img src="LOGO_RESIMEX.png" alt="">
                    <div class="carousel-caption">
                        <h3>Third Slide</h3>
                        <p>This is the third image slide</p>
                    </div>
                </div>-->
            </div>
        
            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>

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
        <h2 style="font-size: 36;"> Tecnología Verde...</h2>

        <br>
        <br>

        <div class="news-cards">
            <div>
                <img src="tecv1.jpg" alt="News 1">
                <h3>Impacto de las tecnologías verdes.</h3>
                <p>Las nuevas tecnologías al servicio del medio ambiente van de la mano con la transición hacia nuevos modelos de negocio...</p>
                <a href="https://www.ecoticias.com/tecnologia-verde/212254_impacto-tecnologias-verdes">Leer Más <i class="fas fa-angle-double-right"></i></a>
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
        <section class="social">
            <p>Grupo Verden</p>
            <div class="links">
                <a href="https://es-la.facebook.com/GrupoVerden1/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://grupoverden.com/">
                    <i class="fa-solid fa-globe"></i>
                </a>
                <a href="https://mx.linkedin.com/company/grupo-verden">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </section>
    </div>
    <!--SCROLL REVEAL-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--CUSTOM JAVASCRIPT-->
    <script src="main.js"></script>
</body>

<footer>
    <!--DATOS DEL DESARROLLADOR EN EL PIÉ DE PÁGINA-->
    <div class="foot">
    <p>Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v1.2.1 - 2022</p>
    </div>
</footer>

</html>
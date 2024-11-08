<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SE CONECTA EL ARCHIVO HTML CON EL CSS-->
    <link rel="stylesheet" href="css/login.css">
    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <title>Iniciar Sesión | INTRAVERDEN</title>
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-image: url(FONDO_1.jpg);">
<div class="container">
        <nav class="nav-main">
           <img src="img/logo_verden.png" alt="Logo Grupo Verden" style="margin-left: 370px;">
        </nav>
</div>
<br>
<br>
    <!--Se crea el formulario que realice una acción mediante el método POST-->
    <form action="logres.php" method="post">
    <h2 class="logo">INICIAR <span> SESIÓN</span></h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
       <?php }?>
       <!--SE AGREGAN LOS CAMPOS DE INPUTS Y LABELS PARA CREAR EL FORMULARIO DE INICIO DE SESIÓN-->
    <label>Usuario: </label>
     	<input type="text" name="uname" placeholder="Correo Empresarial" style="font-family:Arial, Helvetica, sans-serif; font-size:large;"><br>
            <!--EN ESTE APARTADO DE CONTRASEÑA, EL INPUT ES DE TIPO PASSWORD Y PARA PODER VE LOS CARACTERES ES NECESARIO DAR CLIC EN EL BOTÓN DE MOSTRAR-->
    <label>Contraseña: </label>
        <div class="input-group">
            <input name="password" ID="txtPassword" type="Password" Class="form-control" placeholder="Contraseña" style="font-family:Arial, Helvetica, sans-serif; font-size:large;">
        <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
        </div>
        </div>
        <br>
    
     	<button class="log" type="submit" style="font-family:Arial, Helvetica, sans-serif; font-size:large;">Login</button>
    </form>
    <!--CÓDIGO DEL BOTÓN PARA QUE FUNCIONE EL BOTÓN DE MOSTRAR CONTRASEÑA.-->
    <script type="text/javascript">
        function mostrarPassword(){
            var cambio = document.getElementById("txtPassword");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>
</body>
<footer>
    <!--DATOS DEL DESARROLLADOR EN EL PIÉ DE PÁGINA-->
    <div class="foot1" style="font-family:Arial, Helvetica, sans-serif; font-size:medium;">
    <p>Desarrollado por: David Corpi</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v1.2 - 2022</p>
    </div>
</footer>
</html>

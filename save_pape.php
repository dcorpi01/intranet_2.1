<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    include("db.php");

    if(isset($_POST['save_pape'])){
        $nombre = $_POST['nombre'];
        $email = $_SESSION['user_name'];
        $area = $_POST['area'];
        $pape = $_POST['pape'];

        date_default_timezone_set('america/mexico_city');
        $date = date('Y-m-d h:i', time());

        $query = "INSERT INTO papeleria(nombre, correo, area, papeleria, fecha) VALUES ('$nombre', '$email', '$area', '$pape', '$date')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        echo'<script type="text/javascript">
         window.location.href="pape.php";
        </script>';

    }
}else{
    header("Location: login.php");
    exit();
}

?>
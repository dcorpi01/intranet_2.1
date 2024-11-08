<?php 

include("db.php");

if(isset($_POST['guardar_c'])){
    $name_c = $_POST['fullname'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $mens = $_POST['msg'];

    $save_con = "INSERT INTO contacto(nombre, email, phone, area, mensaje) VALUES ('$name_c', '$mail', '$phone', '$area', '$mens')";
    $result = mysqli_query($conn, $save_con);

    if(!$result){
        die("Query Failed");
    }
    echo'<script type="text/javascript">
    window.location.href="comentario_ok.php";
    </script>';
}else{
    header("Location: cotacto.php");
    exit();
}
?>
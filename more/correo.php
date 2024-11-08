<?php
    if(isset($_POST['enviar'])){
        if(!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['area']) && !empty($_POST['msg'])){

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $area = $_POST['area'];
            $msg = $_POST['msg'];

            $header = "From: practicante.sistemas@grupoverden.com" . "r/n";
            $header .= "Reply-to: practicante.sistemas@grupoverden.com" . "r/n";
            $header .= "X-Mailer: PHP/". phpversion();
            $mail = @mail($fullname,$phone, $area, $msg, $header);
            
            if($mail) {
                echo "<h4>Comentario enviado exitosamente!</h4>";
            }
        }
    }

?>
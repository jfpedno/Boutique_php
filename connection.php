<?php
    $host = "localhost";
    $bd_user = "jfpedno";
    $bd_pass = "123";
    $bd_name = "ma2bd";

    $connect = mysqli_connect($host, $bd_user, $bd_pass, $bd_name);

    if(mysqli_connect_errno()){

        die("Échec de connexion à la base de données! <br> Code erreur:". mysqli_connect_errno());

    }
?>


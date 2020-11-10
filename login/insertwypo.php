<?php
    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $ksiazka=$_POST['tytul'];
    $user=$_POST['user'];

    $sql = "INSERT INTO `wypozyczenia`( `ksiazka`, `user`, `data_wyp`, `data_do_odania`) VALUES ($ksiazka, $user, NOW(), NOW()+INTERVAL 3 WEEK)";

    echo($sql);

    mysqli_query($conn, $sql);
    $conn->close();

    header('Location: login2.php');
?>


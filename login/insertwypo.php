<?php
    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $ksiazka=$_POST['tytul'];
    $user=$_POST['user'];

    $sql = "INSERT INTO `wypozyczenia`( `ksiazka`, `user`) VALUES ($ksiazka, $user)";

    echo($sql);

    mysqli_query($conn, $sql);
    $conn->close();

    header('Location: login2.php');
?>


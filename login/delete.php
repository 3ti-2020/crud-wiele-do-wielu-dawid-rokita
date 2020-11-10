<?php
    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $tytul=$_POST['tytul'];

    $sql="DELETE FROM wypozyczenia WHERE id_wypozyczenia=$tytul";

    mysqli_query($conn, $sql);

    $conn->close();

    header('Location: login2.php');

?>
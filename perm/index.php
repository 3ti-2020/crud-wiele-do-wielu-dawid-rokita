<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dawid Rokita</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<?php

    session_start();    //start sesji

    if(isset($_GET['akcja']) && $_GET['akcja'] == 'wyloguj' ){  //sprawdzenie czy była akcja wyloguj
        unset($_SESSION['zalogowany']);                         //odznaczenie opcji zalogowany
    }

    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);
?>  
    <form action="role.php" method="POST">
        LOGIN: <input class="inputy" type="text" name="login" placeholder="login...">
        HASLO: <input class="inputy" type="text" name="haslo" placeholder="haslo...">
        <input type="submit" value="zaloguj">
    </form>

</body>
</html>
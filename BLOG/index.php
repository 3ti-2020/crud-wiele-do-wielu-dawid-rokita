<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
        $servername="remotemysql.com";
        $username="4L24VPRVqQ";
        $password="497eXnGLGd";
        $dbname="4L24VPRVqQ";

        $conn = new mysqli($servername, $username, $password, $dbname);
    
        $result = $conn->query("SELECT tytul, tekst, nazwa FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id");

    ?>

    <div class="container">

    <?php
            while($wiersz = $result->fetch_assoc()){
                echo("<div class='header'>");
                    echo("<h1>".$wiersz['tytul']."</h1>");
                    echo("<h3>".$wiersz['nazwa']."</h3>");
                echo("</div>");
                echo("<div class='main'>");
                    echo("<p>".$wiersz['tekst']."</p>");
                echo("</div>");
                // echo("<tr class='son'>");
                // echo("<td>".$wiersz['tytul']."</td><td>".$wiersz['tekst']."</td><td>".$wiersz['nazwa']."</td>");
                // echo("</tr>");
            }
    ?>
      </div>
</body>
</html>
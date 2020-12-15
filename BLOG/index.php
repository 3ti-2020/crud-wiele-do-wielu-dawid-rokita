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
    
        $result = $conn->query("SELECT tytul, tekst, nazwa FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id LIMIT 1");
        $result2 = $conn->query("SELECT nazwa FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id");
    ?>

<div class="container">
    <div class="a">
        <h1>BLOG</h1>
    </div>
    <div class="b">
        <?php
                while($wiersz = $result->fetch_assoc()){
                    echo("<div class='header'>");
                        echo("<h1>".$wiersz['tytul']."</h1>");
                    while($wiersz2 = $result2->fetch_assoc()){
                        echo("<h3>".$wiersz2['nazwa']."</h3>");
                    } 
                    echo("</div>");
                    echo("<div class='main'>");
                        echo("<p>".$wiersz['tekst']."</p>");
                    echo("</div>");
                }
        ?>
    </div>
</div>
</body>
</html>
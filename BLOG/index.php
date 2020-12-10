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
    
        $result = $conn->query("SELECT * FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id");
        echo("<table>");
            echo("<tr class='head'>
                <td>tytul</td>
                <td>tekst</td>
                <td>tag</td>
            </tr>");
            while($wiersz = $result->fetch_assoc()){
                echo("<tr class='son'>");
                echo("<td>".$wiersz['tytul']."</td><td>".$wiersz['tekst']."</td><td>".$wiersz['nazwa']."</td>");
                echo("</tr>");
            }
            echo("</table>");
    ?>
</body>
</html>
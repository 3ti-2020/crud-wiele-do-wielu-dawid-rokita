<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
        $servername="remotemysql.com";
        $username="4L24VPRVqQ";
        $password="497eXnGLGd";
        $dbname="4L24VPRVqQ";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if(isset($_GET['akcja'])){  //sprawdzenie czy został klikniety jakis tag
            $zmienna = $_GET['akcja'];
            $result = $conn->query("SELECT Distinct tytul, tekst, posty.id, img FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id AND nazwa = '$zmienna'"); 
        }else{
            $result = $conn->query("SELECT Distinct tytul, tekst, id, img FROM posty");  
        }     
    ?>

<div class="container">
    <div class="a">
    <div class="menu">
        <a href="../index.php" class="btn 3">home <i class="fas fa-home"></i></a>
        <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-dawid-rokita"  class="btn" class="btn 1">Github <i class="fab fa-github"></i></a>
    </div>
    <div class="tytul">
        <h1>BLOG</h1>
    </div>
    </div>
    <div class="b">
        <?php
            while($wiersz = $result->fetch_assoc()){
                echo("<div class='header'>");
                    echo("<h1>".$wiersz['tytul']."</h1>");
                    $posty = $wiersz["id"];
                    $result2 = $conn->query("SELECT nazwa FROM `posty_tagi`, posty, tagi WHERE posty_tagi.id_posty = posty.id AND posty_tagi.id_tagi = tagi.id AND posty_tagi.id_posty = $posty");
                while($wiersz2 = $result2->fetch_assoc()){
                    echo("<tr><b><a href='?akcja=".$wiersz2['nazwa']."'>".$wiersz2['nazwa']."</a></b></tr>, ");
                } 
                echo("</div>");
                echo("<div class='main'>");
                    echo("<p>".$wiersz['tekst']."</p>");
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $wiersz['img'] ).'"/>';
                echo("</div>");
            }
        ?>
    </div>
</div>
</body>
</html>
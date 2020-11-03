<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dawid Rokita</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="grid">
        <div class="item1">
            <div class="tytul">
                <h1>DAWID ROKITA GR.2</h1>
            </div>
            <div class="menu">
                <a href="#" class="btn 1">A</a>
                <a href="#" class="btn 2">B</a>
                <a href="index2.php" class="btn 3">C</a>
                <a href="#" class="btn 4">D</a>
            </div>
        </div>
        <div class="item2">
            <a href="./karta/karta.html" class="linka">KARTA</a>
            <a href="#" class="linkb">LOGIN</a>
         
        </div>
        <div class="item3">
            <form action="insert.php" method="POST">
                <ul>
                    <li><h2>INSERT: </h2></li>
                    <li>AUTOR:<input type="text" name="name"></li>
                    <li>TYTUL:<input type="text" name="tytul"></li>
                    <li><input type="submit" value="INSERT"></li>
                </ul>
            </form>
        </div>
        <div class="item4">
 
        <?php

            session_start();

            if(isset($_GET['akcja']) && $_GET['akcja'] == 'wyloguj' ){
                unset($_SESSION['zalogowany']);
            }
            // $servername="localhost";
            // $username="Dawid";
            // $password="dawid";
            // $dbname="biblioteka";

            $servername="remotemysql.com";
            $username="4L24VPRVqQ";
            $password="497eXnGLGd";
            $dbname="4L24VPRVqQ";

            $conn = new mysqli($servername, $username, $password, $dbname);

            $result = $conn->query("SELECT name, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");
            $result2 = $conn->query("SELECT * FROM lib_tytul");
            $result3 = $conn->query("SELECT * FROM lib_autor");
            
//---------------------------TABELA KSIAZKI-------------------------------------
            echo("<div class='upper'>");
            echo("<div>");
            echo("<table>");
            echo("<h3>TABELA KSIAZKI</h3>");
            echo("<tr>
                <td>Autor</td>
                <td>Tytul</td>
            </tr>");
            while($wiersz = $result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$wiersz['name']."</td><td>".$wiersz['tytul']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            echo("</div>");
            echo("</div>");
            echo("<div class='lower'>");
//---------------------------TABELA AUTORZY-------------------------------------
            echo("<div>");
            echo("<table>");
            echo("<h3>TABELA AUTORZY</h3>");
            echo("<tr>
                <td>id</td>
                <td>Autor</td>
            </tr>");
            while($wiersz3 = $result3->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$wiersz3['id']."</td><td>".$wiersz3['name']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            echo("</div>");
//---------------------------TABELA TYTULY-------------------------------------
            echo("<div>");
            echo("<table>");
            echo("<h3>TABELA TYTULY</h3>");
            echo("<tr>
                <td>id</td>
                <td>Tytul</td>
            </tr>");
            while($wiersz2 = $result2->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$wiersz2['id_tytul']."</td><td>".$wiersz2['tytul']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            echo("<div>");
            echo("</div>");
        ?> 
        </div>
    </div>


    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <img src="profile.jpg" alt="">
            <form action="./login/login2.php" method="POST">
                LOGIN: <input class="inputy" type="text" name="login">
                HASLO: <input class="inputy" type="text" name="haslo">
                <input type="submit" value="zaloguj">
            </form>
        </div>
    </div>

        <script src="script.js"></script>
</body>
</html>
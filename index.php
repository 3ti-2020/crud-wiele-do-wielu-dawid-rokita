<?php
     session_start();    //start sesji

     if(isset($_GET['akcja']) && $_GET['akcja'] == 'wyloguj' ){  //sprawdzenie czy była akcja wyloguj
         unset($_SESSION['zalogowany']);                         //odznaczenie opcji zalogowany
         unset($_SESSION['admin']); 
     }
?>

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
    <div class="grid">
        <div class="item1">
            <div class="menu">
                <button class="fas fa-bars leftmenu"></button>
                <a href="./egzamin/index.html" class="btn 5">Egzamin <i class="fas fa-graduation-cap"></i></a>
                <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-dawid-rokita"  class="btn" class="btn 1">Github <i class="fab fa-github"></i></a>
                <a href="#" class="robocze btn 2">Tabele <i class="fas fa-table"></i></a>
                <a href="./TO DO/index.html" class="btn 3">ToDo <i class="fas fa-list-ul"></i></a>
                <a href="./karta/karta.html" class="btn 4">Karta <i class="fas fa-address-card"></i></a>
                <a href="./login/login2.php" class="btn 5">Wypożycz <i class="fas fa-book"></i></a>
                <a href="./BLOG/index.php" class="btn 6">Blog <i class="fab fa-blogger"></i></a>
            </div>
            <div class="tytul">
                <h1>DAWID ROKITA GR.2</h1>
                <?php
                    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                            echo("<h5>ZALOGOWANO JAKO ADMINISTRATOR</h5>");
                        }else{
                            echo("<h5>ZALOGOWANO JAKO GOŚĆ</h5>");
                        }  
                    }
                    ?>
            </div>
        </div>
        <div class="item2">
            <?php
                if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
                   echo("<a href='index.php?akcja=wyloguj' class='fas fa-sign-out-alt linkb'> WYLOGUJ</a>");
                }else{
                    echo("<a href='#' class='fas fa-sign-in-alt linkb'> ZALOGUJ</a>");
                }
            ?>
            <a href="#" class="fas fa-plus linka"> DODAWAJ</a>
        </div>
        <div class="item3">
            <form action="insert.php" method="POST">
                <ul>
                    <li><h3 class="noweksiazki">DODAJ NOWE KSIĄŻKI: </h3></li>
                    <li>AUTOR:<input type="text" name="name"></li>
                    <li>TYTUL:<input type="text" name="tytul"></li>
                    <li><input type="submit" value="DODAJ"></li>
                </ul>
            </form>
        </div>
        <div class="item4">
 
        <?php
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
            echo("<tr class='head'>
                <td>Autor</td>
                <td>Tytul</td>
            </tr>");
            while($wiersz = $result->fetch_assoc()){
                echo("<tr class='son'>");
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
            echo("<tr class='head'>
                <td>id</td>
                <td>Autor</td>
            </tr>");
            while($wiersz3 = $result3->fetch_assoc()){
                echo("<tr  class='son'>");
                echo("<td>".$wiersz3['id']."</td><td>".$wiersz3['name']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            echo("</div>");
//---------------------------TABELA TYTULY-------------------------------------
            echo("<div>");
            echo("<table>");
            echo("<h3>TABELA TYTULY</h3>");
            echo("<tr class='head'>
                <td>id</td>
                <td>Tytul</td>
            </tr>");
            while($wiersz2 = $result2->fetch_assoc()){
                echo("<tr  class='son'>");
                echo("<td>".$wiersz2['id_tytul']."</td><td>".$wiersz2['tytul']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            echo("<div>");
            echo("</div>");

            $conn->close();
        ?> 
        </div>
    </div>

<!---------------------- OKNO MODALNE LOGUJĄCE --------------------------------->
    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <img src="profile.png" alt="">
            <form action="./login/login2.php" method="POST">
                LOGIN: <input class="inputy" type="text" name="login" placeholder="login...">
                HASLO: <input class="inputy" type="text" name="haslo" placeholder="haslo...">
                <input type="submit" value="zaloguj">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
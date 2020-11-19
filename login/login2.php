<?php
    session_start();
    
    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT * FROM user");

    if(isset($_POST['haslo']) && isset($_POST['login'])){
        while($wiersz = $result->fetch_assoc()){
            if($wiersz['name']==$_POST['login'] && $wiersz['password']==$_POST['haslo'] && $wiersz['role'] == 2){
                $_SESSION['zalogowany'] = 1;
                $_SESSION['admin'] = 1;
            }else if($wiersz['name']==$_POST['login'] && $wiersz['password']==$_POST['haslo']){
                $_SESSION['zalogowany'] = 1;
            }
        }
    }

    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="main2.css">
    </head>
    <body>
        <div class="grid">
            <div class="item1">
            <div class="menu">
                    <button class="fas fa-bars leftmenu"></button>
                    <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-dawid-rokita"  class="btn" class="btn 1">github <i class="fab fa-github"></i></a>
                    <a href="#" class="robocze btn 2">tabele <i class="fas fa-table"></i></a>
                    <a href="../index.php" class="btn 3">home <i class="fas fa-home"></i></a>
                    <a href="../karta/karta.html" class="btn 4">karta <i class="fas fa-address-card"></i></a>
                </div>
                <div class="tytul"> 
                    <h1 class="tytulstrony">STRONA WYPOZYCZENIA</h1>
                    <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                            echo("<h5>ZALOGOWANO JAKO ADMINISTRATOR</h5>");
                        }else{
                            echo("<h5>ZALOGOWANO JAKO GOŚĆ</h5>");
                        }  
                    ?>
                </div>
                
            </div>
            <div class="item2">
                <a href='https://crud-dawid-rokita.herokuapp.com?akcja=wyloguj' class="linka">WYLOGUJ <i class="fas fa-sign-out-alt"></i></a>

                <div class="formularz">
                    <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                            echo("<h4>MASZ UPRAWNIENIA ADMINISTRATORSKIE</h4>");  
                    ?>
                    <!-- --------------------------------FORMULARZ--------------- -->
                        <form action="insertwypo.php" method="POST" class="insertwypo">
                            <p>wybierz książkę:</p>
                            <?php
                                $result3 = $conn->query("SELECT id_autor_tytul ,name, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");
                                echo("<select name='tytul'>");
                                while($wiersz3 = $result3->fetch_assoc()){
                                    echo("<option value='".$wiersz3['id_autor_tytul']."' name='tytul'>".$wiersz3['name'].":  ".$wiersz3['tytul']."</option>");
                                }
                                echo("</select>");
                            ?>
                            <p>wybierz uzytkownika:</p> 
                            <?php
                                $result4 = $conn->query("SELECT id_user, name FROM user");
                                echo("<select name='user'>");
                                while($wiersz4 = $result4->fetch_assoc()){
                                    echo("<option value='".$wiersz4['id_user']."' name='user'>".$wiersz4['name']."</option>");
                                }
                                echo("</select>");
                            ?>
                            <input type="submit" value="WYPOŻYCZ">
                        </form>
                    <!-- ----------------------------KONIEC FORMULARZA---------------- -->
                    <?php
                        }else{
                            echo("<h4>NIE MASZ UPRAWNIEN ADMINISTRATORSKICH</h4>");
                            echo("<p class='podtekst'>Nie możesz wpisywać nowych wypożyczeń</p>");
                        }
                    ?>
                
                </div>
            </div>
            <div class="item3"></div>
            <div class="item4">
                <?php
                    $servername="remotemysql.com";
                    $username="4L24VPRVqQ";
                    $password="497eXnGLGd";
                    $dbname="4L24VPRVqQ";
        
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $result2 = $conn->query("SELECT id_wypozyczenia, lib_autor.name as autor, tytul, user.name as user, data_wyp, data_do_odania FROM wypozyczenia, lib_tytul, lib_autor_tytul, lib_autor, user WHERE wypozyczenia.ksiazka = lib_autor_tytul.id_autor_tytul AND wypozyczenia.user = user.id_user AND lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                    //------------------------TABELA WYPOZYCZENIA ADMIN---------------------------------
                        echo("<table>");
                        echo("<h3>TABELA WYPOZYCZENIA</h3>");
                        echo("<tr class='head'>
                            <td>autor</td>
                            <td>tytul</td>
                            <td>uzytkownik</td>
                            <td>data wypozyczenia</td>
                            <td>data do oddania</td>
                            <td>dni do oddania</td>
                            <td>oddaj</td>
                        </tr>");
                        while($wiersz2 = $result2->fetch_assoc()){
                            $date1 = $wiersz2['data_do_odania'];
                            $date2 = date("Y-m-d");
                            echo("<tr class='son'>");
                            echo("<td>".$wiersz2['autor']."</td><td>".$wiersz2['tytul']."</td><td>".$wiersz2['user']."</td><td>".$wiersz2['data_wyp']."</td><td>".$wiersz2['data_do_odania']."</td>");
                            if(((strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)) < 3){
                                echo("<td class='bgred'>".(strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)."</td>");
                            }else{
                                echo("<td class='bggreen'>".(strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)."</td>");
                            }
                            echo("<td>
                                <form action='delete.php' method='POST'>
                                    <input type='hidden' name='tytul' value='".$wiersz2['id_wypozyczenia']."'>
                                    <input type='submit' name='POST' value='oddaj' class='oddaj'>
                                </form>
                            </td>");

                         
                            echo("</tr>");
                        }
                        echo("</table>");        
                    }else{
                    //------------------------TABELA WYPOZYCZENIA GUEST---------------------------------
                        echo("<table>");
                        echo("<h3>TABELA WYPOZYCZENIA</h3>");
                        echo("<tr class='head'>
                            <td>autor</td>
                            <td>tytul</td>
                            <td>uzytkownik</td>
                            <td>data wypozyczenia</td>
                            <td>data do oddania</td>
                            <td>dni do oddania</td>
                        </tr>");
                        while($wiersz2 = $result2->fetch_assoc()){
                            $date1 = $wiersz2['data_do_odania'];
                            $date2 = date("Y-m-d");
                            echo("<tr class='sono'>");
                            echo("<td class='son'>".$wiersz2['autor']."</td><td class='son'>".$wiersz2['tytul']."</td><td class='son'>".$wiersz2['user']."</td><td class='son'>".$wiersz2['data_wyp']."</td><td class='son'>".$wiersz2['data_do_odania']."</td>");
                            
                            if(((strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)) < 3){
                                echo("<td class='bgred'>".(strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)."</td>");
                            }else{
                                echo("<td class='bggreen'>".(strtotime($date1) - strtotime($date2)) / (60 * 60 * 24)."</td>");
                            }
                            echo("</tr>");
                        }
                        echo("</table>");  




                    }
                    $conn->close();
                ?>
            </div>
        </div>
        <script src="script2.js"></script>
    </body>
    </html>
<?php
    }else{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="upper">
            <h1>NIE ZALOGOWANO</h1>
            <h3>BŁĘDNE HASŁO LUB LOGIN</h3>
        </div>
        <div class="lower">
            <a href='https://crud-dawid-rokita.herokuapp.com?akcja=wyloguj'>POWRÓT</a>
        </div>
        
    </body>
    </html>

<?php
    }
?>
<?php
    session_start();
    
    if(isset($_POST['haslo']) && $_POST['haslo'] == 'a' ){
        $_SESSION['zalogowany'] = 1;
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
                <div class="tytul">
                    <h1>STRONA WYPOZYCZENIA</h1>
                </div>
                <div class="menu">
                <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-dawid-rokita"  class="btn fab fa-github" class="btn 1"></a>
                    <a href="#" class="btn 2">B</a>
                    <a href="index.php" class="btn 3">C</a>
                    <a href="#" class="btn 4">D</a>
                </div>
            </div>
            <div class="item2">
                <a href='https://crud-dawid-rokita.herokuapp.com?akcja=wyloguj' class="linka">WYLOGUJ</a>
            </div>
            <div class="item3"></div>
            <div class="item4">
                <?php
                    $servername="remotemysql.com";
                    $username="4L24VPRVqQ";
                    $password="497eXnGLGd";
                    $dbname="4L24VPRVqQ";
        
                    $conn = new mysqli($servername, $username, $password, $dbname);
                
//-----------------------TABELA USER--------------------------------------
                    $result = $conn->query("SELECT * FROM user");

                    echo("<table>");
                    echo("<h3>TABELA user</h3>");
                    echo("<tr class='head'>
                        <td>name</td>
                        <td>password</td>
                        <td>admin</td>
                    </tr>");
                    while($wiersz = $result->fetch_assoc()){
                        echo("<tr class='son'>");
                        echo("<td>".$wiersz['name']."</td><td>".$wiersz['password']."</td><td>".$wiersz['admin']."</td>");
                        echo("</tr>");
                    }
                    echo("</table>");

//------------------------TABELA WYPOZYCZENIA---------------------------------
                    $result2 = $conn->query("SELECT id_wypozyczenia, lib_autor.name as autor, tytul, user.name as user FROM wypozyczenia, lib_tytul, lib_autor_tytul, lib_autor, user WHERE wypozyczenia.ksiazka = lib_autor_tytul.id_autor_tytul AND wypozyczenia.user = user.id_user AND lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");

                    echo("<table>");
                    echo("<h3>TABELA WYPOZYCZENIA</h3>");
                    echo("<tr class='head'>
                        <td>id</td>
                        <td>autor</td>
                        <td>tytul</td>
                        <td>uzytkownik</td>
                    </tr>");
                    while($wiersz2 = $result2->fetch_assoc()){
                        echo("<tr class='son'>");
                        echo("<td>".$wiersz2['id_wypozyczenia']."</td><td>".$wiersz2['autor']."</td><td>".$wiersz2['tytul']."</td><td>".$wiersz2['user']."</td>");
                        echo("</tr>");
                    }
                    echo("</table>");
                
                    $conn->close();
                ?>
            </div>
        </div>
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
            <h3>BŁĘDNE HASŁO</h3>
        </div>
        <div class="lower">
            <a href='https://crud-dawid-rokita.herokuapp.com?akcja=wyloguj'>POWRÓT</a>
        </div>
        
    </body>
    </html>

<?php
    }
?>


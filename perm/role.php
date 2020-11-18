<?php
    session_start();
    
    $servername="remotemysql.com";
    $username="4L24VPRVqQ";
    $password="497eXnGLGd";
    $dbname="4L24VPRVqQ";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT user.name as user, role.name as rola, permission.name as pozwolenie FROM `permission`, role, user, perm_role WHERE user.role = role.id AND perm_role.role = role.id AND perm_role.permission = permission.id");

    $result2 = $conn->query("SELECT * FROM user");
    if(isset($_POST['haslo']) && isset($_POST['login'])){
        while($wiersz2 = $result2->fetch_assoc()){
            if($wiersz2['name']==$_POST['login'] && $wiersz2['password']==$_POST['haslo']){
                $_SESSION['zalogowany'] = 1;
            }
        }
    }

    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){

        //sprawdzanie uprawnień






        echo('zalogowano');

        echo("<table>");
        echo("<h3>pozwolenia uzytkownikow</h3>");
        echo("<tr class='head'>
            <td>user</td>
            <td>rola</td>
            <td>pozwolenie</td>
        </tr>");
        while($wiersz = $result->fetch_assoc()){
            echo("<tr class='son'>");
            echo("<td>".$wiersz['user']."</td><td>".$wiersz['rola']."</td><td>".$wiersz['pozwolenie']."</td>");
            echo("</tr>");
        }
        echo("</table>");

        echo("<a href='index.php?akcja=wyloguj'>WYLOGUJ</a>");
    }else{
        echo("nie zalogowano");
        echo("<a href='index.php'>powrot</a>");
    }

    

    

    

    

?>



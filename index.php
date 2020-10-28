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
            <h1>DAWID ROKITA</h1>
        </div>
        <div class="item2">
            <ul>
                <li><a href="">LINK1</a></li>
                <li><a href="">LINK2</a></li>
            </ul>
        </div>
        <div class="item3">
            <form action="insert.php" method="POST">
                <ul>
                    <li><h2>INSERT: </h2></li>
                    <li>name:<input type="text" name="name"></li>
                    <li>tytyl:<input type="text" name="tytul"></li>
                    <li><input type="submit" value="INSERT"></li>
                </ul>
            </form>
        </div>
        <div class="item4">
        <?php
            // $servername="localhost";
            // $username="Dawid";
            // $password="dawid";
            // $dbname="biblioteka";

            $servername="remotemysql.com";
            $username="4L24VPRVqQ";
            $password="497eXnGLGd";
            $dbname="4L24VPRVqQ";

            $conn = new mysqli($servername, $username, $password, $dbname);

            $result = $conn->query("SELECT * FROM lib_autor");
            
            echo("<table>");
            echo("<tr>
                <td>name</td>
                <td>tytul</td>
            </tr>");
            while($wiersz = $result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$wiersz['name']."</td><td>".$wiersz['id']."</td>");
                echo("</tr>");
            }
            echo("</table>");
        ?> 
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <li>name:<input type="text" name="name"></li>
                    <li>tytyl:<input type="text" name="tytul"></li>
                    <li><input type="submit" value="INSERT"></li>
                </ul>
            </form>
        </div>
        <div class="item4">
        <!-- <?php
            echo("START");

            $servername="127.0.0.1";
            $username="Dawid";
            $password="Dawid";
            $dbname="bibliotreka";

            $conn = new mysqli($servername, $username, $password, $dbname);

            $result = $conn->query();
            
            echo("<table>");
            while($wiersz = $result->fetch_assoc()){
                echo("tr");
                echo("<td>".$wiersz['']."</td>");
                echo("/tr");
            }
            echo("</table>");
        ?> -->
        </div>
    </div>

    
</body>
</html>
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
    ?>
</body>
</html>
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

    $name = $_POST['name'];
    $tytul = $_POST['tytul'];

    $check = $conn->query("SELECT name, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");
    $check2 = $conn->query("SELECT name, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");

    while($dane = $check->fetch_assoc()){
        if($name !== $dane['name']){
            $liczba1 = 0;
        }else{
            $liczba1 = 1;
            break;
        }
    }
    while($dane2 = $check2->fetch_assoc()){
        if($tytul !== $dane2['tytul']){
            $liczba2 = 0;
        }else{
            $liczba2 = 1;
            break;
        }
    }

    if($liczba1 === 1 AND $liczba2 === 0){

        echo($liczba1);
        echo($liczba2);
        $sql2  = "INSERT INTO lib_tytul (tytul) VALUES ('$tytul')";
        mysqli_query($conn, $sql2);

        $result = $conn->query("SELECT id FROM `lib_autor` WHERE name='$name'");
        $result2 = $conn->query("SELECT id_tytul FROM lib_tytul order by id_tytul desc limit 1");

        while($wiersz = $result->fetch_assoc()){
            $zmienna= $wiersz['id'];
        }
            
        while($wiersz2 = $result2->fetch_assoc()){
            $zmienna2= $wiersz2['id_tytul'];
        } 
                
        $sql3  = "INSERT INTO `lib_autor_tytul`(`id_autor`, `id_tytul`) VALUES ('$zmienna', '$zmienna2')";
            
        mysqli_query($conn, $sql3);
            
    } else if($liczba1 === 0 AND $liczba2 === 1){
        
        echo($liczba1);
        echo($liczba2);

        $sql = "INSERT INTO lib_autor(name) VALUES ('$name')";
        mysqli_query($conn, $sql);

        $result = $conn->query("SELECT id FROM `lib_autor`order by id desc limit 1");
        $result2 = $conn->query("SELECT id_tytul FROM lib_tytul WHERE tytul='$tytul'");

        while($wiersz = $result->fetch_assoc()){
            $zmienna= $wiersz['id'];
        }
            
        while($wiersz2 = $result2->fetch_assoc()){
            $zmienna2= $wiersz2['id_tytul'];
        } 

        $sql3  = "INSERT INTO `lib_autor_tytul`(`id_autor`, `id_tytul`) VALUES ('$zmienna', '$zmienna2')";
            
        mysqli_query($conn, $sql3);

    } else if($liczba1 === 0 AND $liczba2 === 0){

        echo($liczba1);
        echo($liczba2);
        $sql = "INSERT INTO lib_autor(name) VALUES ('$name')";
        $sql2  = "INSERT INTO lib_tytul(tytul) VALUES ('$tytul')";
        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);

        $result = $conn->query("SELECT id FROM `lib_autor` order by id desc limit 1");
        $result2 = $conn->query("SELECT id_tytul FROM lib_tytul order by id_tytul desc limit 1");

        while($wiersz = $result->fetch_assoc()){
            $zmienna= $wiersz['id'];
        }
            
         while($wiersz2 = $result2->fetch_assoc()){
            $zmienna2= $wiersz2['id_tytul'];
        } 
                
        $sql3  = "INSERT INTO `lib_autor_tytul`(`id_autor`, `id_tytul`) VALUES ('$zmienna', '$zmienna2')";
            
        echo($sql3);
        mysqli_query($conn, $sql3);

    } else {

        echo("AUTOR Z TYTULEM JUZ ISTNIEJA");

    }

    $conn->close();

    header('Location: http://localhost/crud/index.php');
?>
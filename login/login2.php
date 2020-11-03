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
        <link rel="stylesheet" href="/crud/main.css">
    </head>
    <body>
        <div class="grid">
            <div class="item1">
                <div class="tytul">
                    <h1>TAJNA STRONA</h1>
                </div>
                <div class="menu">
                    <a href="#" class="btn 1">A</a>
                    <a href="#" class="btn 2">B</a>
                    <a href="index.php" class="btn 3">C</a>
                    <a href="#" class="btn 4">D</a>
                </div>
            </div>
            <div class="item2">
                <a href='https://crud-dawid-rokita.herokuapp.com/' class="linka">WYLOGUJ</a>
            </div>
            <div class="item3"></div>
            <div class="item4">
                <h3>TAJNE INFORMACJE:</h3>
                <ul>
                    <li>Delta Team dostał się do 2 etapu konkursu CanSat</li>
                    <li></li>
                </ul>
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
            <a href='https://crud-dawid-rokita.herokuapp.com/'>POWRÓT</a>
        </div>
        
    </body>
    </html>

<?php
    }
?>


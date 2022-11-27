<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/laptop-logo.png" alt="logo">
            <a href="homepage.php">Typing race</a>
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Graj!</a></li>
            <li><a href="">Rankingi</a></li>
            <li><a href="logoff.php">Wyloguj</a></li>
            <li><a href="">Twój profil</a></li>
        </ul>
    </header>
    <main>
        <div class="pregame">
            <div class="info">Bądź najszybszym w pisaniu na klawiaturze!</div>
            <button class="play" onclick="preGame()">Graj!</button>
        </div>
        <div class="game">
            <div class="wpm">wpm: 60</div>
            <div class="time">Czas: 60</div>
            <div class="text">Randomowy tekst</div>
            <textarea name="textInput" id="textInput" cols="30" rows="10"></textarea>
        </div>
        <script src="js/gra.js"></script>
    </main>
    <footer>
        <div class="podpis">Darek enterprises&copy;</div>
    </footer>
</body>
</html>
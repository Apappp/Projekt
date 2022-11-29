<?php
    require_once('database/database_connection.php');
    if(!isset($_SESSION['user']))
        header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/laptop-logo.png" alt="logo">
            <a href="homepage.php">Typing race</a>
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Graj!</a></li>
            <li><a href="scores.php">Wyniki</a></li>
            <li><a href="logoff.php">Wyloguj</a></li>
            <li><a href="profile.php">Twój profil</a></li>
        </ul>
    </header>
    <main class="scores">
        <div class="container">
            <h2>Najlepsze Wyniki</h2>
            <table class="table">
                <tr class="item headers">
                    <th>Name: </th>
                    <th>Data: </th>
                    <th>Acc: </th>
                    <th>Wpm: </th>
                    <th>Wynik:</th>
                </tr>
                <?php
                    $query = "SELECT users.nickname, scores.score, scores.wpm, scores.acc, scores.datewhen FROM scores INNER JOIN users ON scores.login=users.login ORDER BY scores.score DESC";
                    $result = $connection -> query($query);
                    $i = 0;
                    while(($record = $result -> fetch_assoc()) && ($i < 50)){
                        echo '<tr class="item">';
                        echo '<td>' . $record['nickname'] . '</td>';
                        echo '<td>' . $record['datewhen'] . '</td>';
                        echo '<td>' . $record['acc'] . '</td>';
                        echo '<td>' . $record['wpm'] . '</td>';
                        echo '<td>' . $record['score'] . '</td>';
                        echo '</tr>';
                    }
                ?> 
            </table>
            <!-- <div class="item headers">
                <h4>Name: </h4>
                <h4>Data: </h4>
                <h4>Acc: </h4>
                <h4>Wpm: </h4>
                <h4>Wynik: </h4>
            </div>
        //    <?php
        //        $query = "SELECT * FROM scores ORDER BY score DESC";
        //        $result = $connection -> query($query);
        //        $i = 0;
        //        while(($record = $result -> fetch_assoc()) && ($i < 50)){
        //            echo '<div class="item">';
        //            echo '<div>' . $record['login'] . '</div>';
        //            echo '<div>' . $record['datewhen'] . '</div>';
        //            echo '<div>' . $record['acc'] . '</div>';
        //            echo '<div>' . $record['wpm'] . '</div>';
        //            echo '<div>' . $record['score'] . '</div>';
        //            echo '</div>';
        //        }
        //        
        //     ?> -->
        </div>
    </main>
    <footer>
        <div class="podpis">Darek enterprises&copy;</div>
    </footer>
</body>
</html>
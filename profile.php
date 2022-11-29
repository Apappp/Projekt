<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <main class="profile">
        <div class="profileBox">
            <h2 class="top">Profil użytkownika</h2>
            <div class="data">
                <?php
                    require_once('database/database_connection.php');
                    if(!isset($_SESSION['user']))
                        header('Location: index.php');
                    $login = $_SESSION['user'];
                    $query = "SELECT * FROM users WHERE login='$login'";
                    $result = $connection -> query($query);
                    $cells = $result -> fetch_array();
                    $connection -> close();
                ?>
                <div class="name">
                    <span><h2>Nickname: </h2></span>
                    <span>login: </span>
                    <span>E-mail: </span>
                    <span>Wiek: </span>
                </div>
                <div class="content">
                    <span><h2>
                        <?php echo $cells[2] ?>
                    </h2></span>
                    <span>
                        <?php echo $cells[1] ?>
                    </span>
                    <span>
                        <?php echo $cells[3] ?>
                    </span>
                    <span>
                        <?php echo $cells[4] ?>
                    </span>
                </div>
            </div>
            <div class="rest"></div>
        </div>
    </main>
    <footer>
        <div class="podpis">Darek enterprises&copy;</div>
    </footer>
</body>
</html>
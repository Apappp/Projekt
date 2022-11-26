<?php
    session_start();

    if(isset($_SESSION['user']))
        header('Location: homepage.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/64c0f9e8f9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="login-card">
        <div class="login-card-logo">
            <img src="images/laptop-logo.png" alt="logo">
        </div>
        <div class="login-card-header">
            <h2>Zaloguj się</h2>
        </div>
        <form action="login.php" method="post" class="login-card-form">
            <div class="form-item">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="login" placeholder="Login">
            </div>
            <div class="form-item">
                <i class="fa-regular fa-lock"></i>
                <input type="password" name="password" placeholder="Hasło">
            </div>
            <div class="error">
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                        
                ?>
            </div>
            <input type="submit" value="Zaloguj się" name="loginbtn">
        </form>
        <div class="login-card-footer">
            Nie masz konta? <a href="rejestracja.php">Utwórz konto</a>
        </div>
    </div>
    
</body>
</html>
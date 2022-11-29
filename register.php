<?php
    session_start();
    if(isset($_SESSION['user']))
        header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <script src="https://kit.fontawesome.com/64c0f9e8f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="register-card">
        
        <form action="register_push.php" class="register-card-form" method="post">
            <h2 class="register-header"><a href="login.php" class="back">
            <i class="fa-solid fa-arrow-left-long"></i>
        </a>Rejestracja</h2>    
            <div class="form-item">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="login" placeholder="Login">
            </div>
            <?php
                if(isset($_SESSION['short_login'])){
                    echo '<div class="error">' . $_SESSION['short_login'] . '</div>';
                    unset($_SESSION['short_login']);
                }
                if(isset($_SESSION['bad_login'])){
                    echo '<div class="error">' . $_SESSION['bad_login'] . '</div>';
                    unset($_SESSION['bad_login']);
                }
                if(isset($_SESSION['login_exists'])){
                    echo '<div class="error">' . $_SESSION['login_exists'] . '</div>';
                    unset($_SESSION['login_exists']);
                }
            ?>
            <div class="form-item">
            <i class="fa-brands fa-odnoklassniki"></i>
                <input type="text" name="nickname" placeholder="Nick">
            </div>
            <?php
                if(isset($_SESSION['short_nick'])){
                    echo '<div class="error">' . $_SESSION['short_nick'] . '</div>';
                    unset($_SESSION['short_nick']);
                }
            ?>
            <div class="form-item">
                <i class="fa-solid fa-baby-carriage"></i>
                <input type="number" name="age" placeholder="Wiek">
            </div>
            <?php
                if(isset($_SESSION['bad_age'])){
                    echo '<div class="error">' . $_SESSION['bad_age'] . '</div>';
                    unset($_SESSION['bad_age']);
                }
            ?>
            <div class="form-item">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <?php
                if(isset($_SESSION['email_error'])){
                    echo '<div class="error">' . $_SESSION['email_error'] . '</div>';
                    unset($_SESSION['email_error']);
                }
                if(isset($_SESSION['email_exists'])){
                    echo '<div class="error">' . $_SESSION['email_exists'] . '</div>';
                    unset($_SESSION['email_exists']);
                }
            ?>
            <div class="form-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Hasło">
            </div>
            <div class="form-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password2" placeholder="Powtórz hasło">
            </div>
            <?php
                if(isset($_SESSION['short_pass'])){
                    echo '<div class="error">' . $_SESSION['short_pass'] . '</div>';
                    unset($_SESSION['short_pass']);
                }
                if(isset($_SESSION['diff_pass'])){
                    echo '<div class="error">' . $_SESSION['diff_pass'] . '</div>';
                    unset($_SESSION['diff_pass']);
                }
                if(isset($_SESSION['general_error'])){
                    echo '<div class="error">' . $_SESSION['general_error'] . '</div>';
                    unset($_SESSION['general_error']);
                }
            ?>
            <input type="submit" name="registerbtn" value="Zarejestruj">
        </form>
    </div>

</body>
</html>
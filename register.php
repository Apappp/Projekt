<?php
    require_once('database/database_connection.php');
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
        <h2 class="register-header">Rejestracja</h2>
        <form action="" class="register-card-form" method="post">
            <div class="form-item">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="login" placeholder="Login">
            </div>
            <div class="form-item">
            <i class="fa-brands fa-odnoklassniki"></i>
                <input type="text" name="nickname" placeholder="Nick">
            </div>
            <div class="form-item">
                <i class="fa-solid fa-baby-carriage"></i>
                <input type="number" name="age" placeholder="Wiek">
            </div>
            <div class="form-item">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Hasło">
            </div>
            <div class="form-item">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password2" placeholder="Powtórz hasło">
            </div>
            <input type="submit" name="registerbtn" value="Zarejestruj">
        </form>
    </div>

</body>
</html>
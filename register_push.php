<?php
    require_once('database/database_connection.php');

    if(isset($_POST['registerbtn'])){
        $login = $_POST['login'];
        $nickname = $_POST['nickname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $pass1 = $_POST['password'];
        $pass2 = $_POST['password2'];

        $walidacja = true;

        if(strlen($login) < 3){
            $walidacja = false;
            $_SESSION['short_login'] = "Login musi składać się z przynajmniej 3 znaków";
        }
        else if(!ctype_alnum($login)){
            $walidacja = false;
            $_SESSION['bad_login'] = "Login musi się składać tylko z liter i cyfr";
        }
        if(strlen($nickname) == 0){
            $walidacja = false;
            $_SESSION['short_nick'] = "Nick musi składać się przynajmniej z 1 znaku";
        }
        if($age < 0){
            $walidacja = false;
            $_SESSION['bad_age'] = "Błędny wiek";
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $walidacja = false;
            $_SESSION['email_error'] = "Błędny email";
        }
        if($pass1 != $pass2){
            $walidacja = false;
            $_SESSION['diff_pass'] = "Hasła różnią się od siebie";
        }
        else if(strlen($pass1) < 6){
            $walidacja = false;
            $_SESSION['short_pass'] = "Hasło jest za krótkie";
        }
    }
    if(!$walidacja)
        header('Location: register.php');
    else{
        $login = htmlentities($login);
        $nickname = htmlentities($nickname);
        $age = htmlentities($age);
        $email = htmlentities($email);
        $pass1 = htmlentities($pass1);
        $login = $connection -> real_escape_string($login);
        $nickname = $connection -> real_escape_string($nickname);
        $age = $connection -> real_escape_string($age);
        $email = $connection -> real_escape_string($email);
        $pass1 = $connection -> real_escape_string($pass1);

        $query = "SELECT login FROM users WHERE login='$login'";
        $result = $connection -> query($query);

        if($result -> num_rows > 0){
            $_SESSION['login_exists'] = "Login już istnieje";
            header('Location: register.php');
        } 
        else {
            $query = "SELECT email FROM users WHERE email='$email'";
            $result = $connection -> query($query);

            if($result -> num_rows > 0){
                $_SESSION['email_exists'] = "E-mail już istnieje";
                header('Location: register.php');
            }
            else {
                $pass1 = password_hash($pass1, PASSWORD_DEFAULT);
                $query = "INSERT INTO users VALUES (NULL, '$login', '$nickname', '$email', $age, '$pass1')";

                if($connection -> query($query)){
                    header('Location: index.php');
                    $connection -> close();
                }
                else{
                    $_SESSION['general_error'] = "Błąd połączenia";
                    header('Location: register.php');
                }
            }
        }
    }
?>
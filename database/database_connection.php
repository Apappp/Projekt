<?php
    require_once('baza.php');
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli($server, $user, $pass, $database);
    }
    catch (mysqli_sql_exception $e){
        $_SESSION['error'] = $e;
        exit();
    }
    unset($_SESSION['error']);
?>
<?php
    require_once('database/database_connection.php');
    $score = $_POST['score'];
    $login = $_SESSION['user'];
    $datewhen = date('Y-m-d');
    $acc = $_POST['acc'];
    $wpm = $_POST['wpm'];
    $query = "INSERT INTO scores VALUES (NULL, '$score', '$login', '$datewhen', '$acc', '$wpm');";
    $connection -> query($query);
    $connection -> close();
?>
<?php
    $mysqli = new mysqli ("localhost", "root", "", "look_it_share");
    if($mysqli->connect_error) {
        die("can't connect db" . $mysqli->connect_error);
    }
?>
<?php
    $mysqli = new mysqli("localhost", "root", "") or die("cannot comppect database. ");

    $mysqli->select_db("look_it_share")or die("cannot select database. ");

    if(!$mysqli) echo "Cannot Connect Database!!<br>"; 
?>
<?php
    $mysqli = new mysqli("localhost", "root", "") or die("cannot comppect database. ");

    $mysqli->select_db("socialmeadia")or die("cannot select database. ");

    if(!$mysqli) echo "Cannot Connect Database!!<br>"; 
?>
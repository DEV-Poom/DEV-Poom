<?php

    $mysqli = new mysqli("localhost", "root", "") or die("cannot comppect database. ");

    $mysqli->select_db("socialmeadia")or die("cannot select database. ");

    if($mysqli){
        echo ("Connect database");
    }

    $result = $mysqli ->query("select * from user"); //SQL

    while($obj = $result -> fetch_object()){
        echo $obj->user_id."";
        echo $obj->user_name."";
        echo $obj->full_name."";
        echo "<br>";
    }
?>
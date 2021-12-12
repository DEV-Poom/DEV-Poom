้<html>
    <head>
        <title>Socialmedia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <?php

                        echo "<h1>จัดการผู้ใช้</h1>";

                        echo "<p><a href= 'add.php' class='btn btn-primary' <i class='fa-regular fa-plus'></i>เพิ่มผู้ใช้ </a></p>";

                        $mysqli = new mysqli("localhost", "root", "") or die("cannot comppect database. ");

                        $mysqli->select_db("socialmeadia")or die("cannot select database. ");

                        if($mysqli) {
                            //echo "Connect Database Success!!<br>";
                        }

                        $result = $mysqli ->query("select * from user"); //SQL

                        echo "<table class ='table table-bordered table-striped '>";
                        echo "<thead>";
                        echo "<th> รหัสผู้ใช้ </th>";
                        echo "<th> ชื่อผู้ใช้ </th>";
                        echo "<th> ชื่อ-สกุล </th>";
                        echo "<th> จัดการ </th>";
                        echo "</thead>";

                        echo "<tbody>";
                        
                        while($obj = $result -> fetch_object()){
                        echo "<tr>";
                        echo "<td>$obj->user_id. </td>";
                        echo "<td>$obj->user_name.</td>";
                        echo "<td>$obj->full_name.</td>";
                        echo "<td><a href='edit.php?user_id=".$obj->user_id."' class='btn btn-info'><i class='fa fa-pencil'></i> แก้ไข</a> 
                                  <a href='delete.php?user_id=".$obj->user_id."' class='btn btn-danger'><i class='fa fa-trash'></i> ลบ</a></td>";
                        echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                    ?>     
                </div>
            </div>
        </div>
    </body> 
</html>
                    
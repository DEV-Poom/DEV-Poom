<html>
<head>
    <title>Social Media</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <p><a href="list.php" class="btn btn-info">กลับไป</a></p>
    
<?php
    if(isset($_GET["user_id"])) {
            // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
        $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

        $mysqli->select_db("socialmedia") or die("Cannot select database.");

        if(!$mysqli) echo "Cannot Connect Database!!<br>";        

        $user_id = $_GET["user_id"];

        $sql = "delete from user where user_id='$user_id'";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>ลบข้อมูลเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>ลบข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }
?>
</body>
</html>

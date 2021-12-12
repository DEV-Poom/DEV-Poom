<?php
    session_start();
    include("db_connect.php"); 
?>
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
<?php
    if(isset($_POST["regis"])) {

        $user_name = $_POST["user_name"];
        $full_name = $_POST["full_name"];
        $password = $_POST["password"];

        $sql = "insert user (user_name, full_name, password, status)
            value ('$user_name','$full_name','$password','0') ";
        //echo $sql;
        $result = $mysqli->query($sql);
        //echo "num row: ".$result->num_rows."<br>";
        if($result) {
            echo "<div class='alert alert-success'>ลงทะเบียนเสร็จสิ้น</div>";
            echo "<meta http-equiv='refresh' content='2;url=login.php'>";
        } else {
            echo "<div class='alert alert-danger'>ลงทะเบียนล้มเหลว</div>";
            echo "<div>$sql</div>";
            echo "<meta http-equiv='refresh' content='2;url=register.php'>";
        }
    }
?>
<div class="container"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
        <!-- Start content -->
        <h1>ลงทะเบียนสมาชิกใหม่</h1>
        <br>
        <form method="post">
        <p>  
            <label>ชื่อ-สกุล</label>
            <input type="text" name="full_name" class="form-control">
        </p>  
        <p>  
            <label>ชื่อผู้ใช้</label>
            <input type="text" name="user_name" class="form-control">
        </p>              
        <p>  
            <label>รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </p>   
        <p>
            <button type="submit" name="regis" class="btn btn-primary">ลงทะเบียน</button>
        </p>              
        </form>
        <hr>        
        <!-- End content -->
        </div>
    </div>
</div>  
</body>
</html>
